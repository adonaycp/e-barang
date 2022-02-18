<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\BeliBarang;
use App\Category;
use App\Barang;
use DB;
use Auth;
use PDF;
use App;

class BeliBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tanggal_dari = NULL,$tanggal_sampai = NULL)
    {
        $belibarang = BeliBarang::with(['namaBarang'], ['namaKategori'])->get();

        if ($tanggal_dari & $tanggal_sampai)
        {

            $belibarang = BeliBarang::with(['namaBarang'], ['namaKategori'])
               ->whereBetween('tgl_beli', [$tanggal_dari, $tanggal_sampai])
               ->get();
            
        }
        return view('beli-barang.index', compact('belibarang','tanggal_dari','tanggal_sampai'));
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
        return view('beli-barang.create', compact('barangs'), compact('categories'));
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
        $id_barang = $request->input('id_barang'); //ambil dari tabel barang
        $id_category = $request->input('id_category'); //ambil dari tabel category
        $item = $request->input('item');
        $hrg_satuan = $request->input('hrg_satuan');
        $hrg_jumlah = $request->input('hrg_jumlah');
        $tgl_beli = date("Y-m-d", strtotime($request->tgl_beli));
        $operatorinput = $user->id;

        //Validate Total Barang Positif
        $this->validate($request, [
            'item' => 'required|numeric|gt:0|not_in:0',
            'hrg_satuan' => 'required|numeric|gt:0|not_in:0',
        ],[
            'gt' => 'Angka harus lebih besar dari 0'
        ]);

        DB::beginTransaction();

        try
        {
            $belibarang = BeliBarang::create([
            
            'id_barang' => $id_barang,
            'id_category' => $id_category,
            'item' => $item,
            'hrg_satuan' => $hrg_satuan,
            'hrg_jumlah' => $hrg_jumlah,
            'tgl_beli' => $tgl_beli,
            'operatorinput' => $operatorinput
            ]);

            $belibarang->save();

            DB::commit();
            return redirect::to('beli-barang')
                ->with('success','Data berhasil disimpan.');
        }
        catch (\Throwable $t) 
        {
            // dd($user->id);
            // dd($t);
            DB::rollback();
            return redirect::to('beli-barang')
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
     * @param  int  $id_belibarang
     * @return \Illuminate\Http\Response
     */
    public function edit($id_belibarang)
    {
        Auth::user();
        $barangs = Barang::all();
        $categories = Category::all();
  
        $belibarang = DB::table('belibarang')->where('id_belibarang', $id_belibarang)->first();

        return view('beli-barang.edit', compact('belibarang','barangs', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_belibarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_belibarang)
    {
        //Validate Total Barang Positif
        $this->validate($request, [
            'item' => 'required|numeric|gt:0|not_in:0',
            'hrg_satuan' => 'required|numeric|gt:0|not_in:0',
        ],[
            'gt' => 'Angka harus lebih besar dari 0'
        ]);
        
        $barangs = Barang::all();
        $categories = Category::all();
        $user = Auth::user();

        $belibarang = DB::table('belibarang')->where('id_belibarang', $id_belibarang)->update([

        'id_barang' => $request->id_barang,
        'id_category' => $request->id_category,
        'item' => $request->item,
        'hrg_satuan' => $request->hrg_satuan,
        'hrg_jumlah' => $request->hrg_jumlah,
        'tgl_beli' => $request->tgl_beli,
        'operatorinput' => $user->id
        ]);
        
        return redirect('beli-barang')->with('success', 'Data Sudah Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_belibarang)
    {
        $user = Auth::user();
        $belibarang = DB::table('belibarang')->where('id_belibarang', $id_belibarang)->delete();
        return redirect('beli-barang')->with('success', 'Data Berhasil Dihapus');

    }

    public function cetak($tanggal_dari = NULL,$tanggal_sampai = NULL)
    {
        

        $belibarang = BeliBarang::with(['namaBarang'], ['namaKategori'])->get();

        if ($tanggal_dari & $tanggal_sampai)
        {

            $belibarang = BeliBarang::with(['namaBarang'], ['namaKategori'])
               ->whereBetween('tgl_beli', [$tanggal_dari, $tanggal_sampai])
               ->get();
            
        }

        // return view('barang.cetak', compact('barang','tanggal_dari','tanggal_sampai'));

        $pdf = PDF::loadView('beli-barang.cetak',['belibarang' => $belibarang, 'tanggal_dari' => $tanggal_dari, 'tanggal_sampai' => $tanggal_sampai])->setPaper('A4','landscape');
        // $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
       
    }

}
