<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\Barang;
use App\SaldoAwal;
use PDF;
use DB;
use Auth;

class SaldoAwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saldoawal = SaldoAwal::with(['namaBarang'], ['namaKategori'])->get();
        return view('saldo-awal.index', compact('saldoawal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barang::all();
        $categories = Category::all();
        return view('saldo-awal.create', compact('barangs'), compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $id_saldoawal = $request->input('id_saldoawal');
        $id_barang = $request->input('id_barang'); //ambil dari tabel barang
        $id_category = $request->input('id_category');
        $total_ambil = $request->input('total_ambil');
        $tgl_ambil = $request->input('tgl_ambil');
        $tahun = $request->input('tahun');

        DB::beginTransaction();
        try
        {
            $saldoawal = SaldoAwal::create([
            
            'id_barang' => $id_barang,
            'id_category' => $id_category,
            'total_ambil' => $total_ambil,
            'tgl_ambil' => $tgl_ambil,
            'tahun' => $tahun,
            ]);

            $saldoawal->save();

            DB::commit();
            return redirect::to('saldo-awal')
                ->with('success','Data berhasil disimpan.');
        }
        catch (\Throwable $t) 
        {
            // dd($user->id);
            // dd($t);
            DB::rollback();
            return redirect::to('saldo-awal')
                ->with('warning','Data gagal disimpan. Input data kembali.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_saldoawal)
    {
        Auth::user();
        $barangs = Barang::all();
        $categories = Category::all();
  
        $saldoawal = DB::table('saldoawal')->where('id_saldoawal', $id_saldoawal)->first();
        return view('saldo-awal.edit', compact('saldoawal','barangs', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_saldoawal)
    {
        $barangs = Barang::all();
        $categories = Category::all();
        $user = Auth::user();
        $saldoawal = DB::table('saldoawal')->where('id_saldoawal', $id_saldoawal)->update([

        'id_barang' => $request->id_barang,
        'id_category' => $request->id_category,
        'total_ambil' => $request->total_ambil,
        'tgl_ambil' => $request->tgl_ambil,
        'tahun' => $request->tahun,
        ]);
        
        return redirect('saldo-awal')->with('success', 'Data Sudah Terupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_saldoawal)
    {
        $user = Auth::user();
        $saldoawal = DB::table('saldoawal')->where('id_saldoawal', $id_saldoawal)->delete();
        return redirect('saldo-awal')->with('success', 'Data Berhasil Dihapus');

    }

    public function cetak(Request $request)
    {
        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML($this->convert_customer_data_to_html());
        // return $pdf->stream();

        $saldoawal = new SaldoAwal();
        $data = $saldoawal::with(['namaBarang'], ['namaKategori'])->get();
        $pdf = PDF::loadView('saldo-awal.cetak', array('data' => $data));
        return $pdf->stream('cetakdaftarpemenang.pdf', array("Attachment" => true));

        // $pdf = PDF::loadview('index')->setPaper('A4','potrait');
        // return $pdf->stream();
    }
}
