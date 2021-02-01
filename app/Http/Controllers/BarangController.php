<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Barang;
use DB;
use Auth;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::get();
        // $barang = new Barang;
        // $data = $barang->getViewBarang();

        // $suara = new Suara;

        // $datas = $suara->getViewDataSuara();

        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = new Barang;

        return view('barang.create');
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
        // dd($user->id);
        // $id = $request->input('id');
        $nama_brg = $request->input('nama_brg');
        $item = $request->input('item');
        $hrg_satuan = $request->input('hrg_satuan');
        $hrg_jumlah = $request->input('hrg_jumlah');
        // $id_jenis = $request->input('id_jenis');
        $tgl_input = date("Y-m-d");
        $tgl_update = date("Y-m-d");
        $tgl_pembelian = date("Y-m-d");
        $operatorinput = $user->id;
        $tahun = $request->input('tahun');

        DB::beginTransaction();

        try {
            $barang = Barang::create([
                // 'id' => $id,
                'nama_brg' => $nama_brg,
                'item' => $item,
                'hrg_satuan' => $hrg_satuan,
                'hrg_jumlah' => $hrg_jumlah,
                // 'id_jenis' => $id_jenis,
                'tgl_input' => $tgl_input,
                'tgl_update' => $tgl_update,
                'tgl_pembelian'=> $tgl_pembelian,
                'operatorinput' => $operatorinput,
                'tahun' => $tahun
            ]);

            $barang->save();

            DB::commit();

            return redirect::to('barang')
                ->with('success','Data berhasil disimpan.');
        }catch (\Throwable $t) {
        // dd($t);
        
        // dd($user->id);
            DB::rollback();
            return redirect::to('barang')
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
