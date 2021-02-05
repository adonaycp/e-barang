<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AmbilBarang;
use App\Category;
use App\Barang;
use DB;
use Auth;

class AmbilBarangController extends Controller
{
  /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
  public function index()
  {
  /**
    * untuk menampilkan nama kategori dan barang di tabel ambilbarang
    */
    $ambilbarang = AmbilBarang::with('namaBarang', 'namaKategori')->get();
    $barangs = Barang::all();
    $categories = Category::all();
    return view('ambil-barang.create', compact('barangs', 'categories'));
  }

  /**
     * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
  public function create()
  {
    
    // $categories = Category::all();

    // return view('ambil-barang.create', compact('barangs'));
  }

  /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
  public function store(Request $request)
  {
    $id_category = $request->input('id_category'); //ambil dari tabel category
    $id_barang = $request->input('id'); //ambil dari tabel barang
    $total_ambil = $request->input('total_ambil');
    $tgl_ambil = date("Y-m-d");
    $nama_pengambil = $request->input('nama_pengambil');
    $bidang = $request->input('bidang');
    $operatorinput = $user->id;

    DB::beginTransaction();

    try
    {
      $ambilbarang = AmbilBarang::create([
      'id_category' => $id_category,
      'id_barang' => $id,
      'total_ambil' => $total_ambil,
      'tgl_ambil' => $tgl_ambil,
      'nama_pengambil' => $nama_pengambil,
      'bidang' => $bidang,
      'operatorinput' => $operatorinput
      ]);

      $ambilbarang->save();

      DB::commit();
        return redirect::to('ambil-barang')
          ->with('success','Data berhasil disimpan.');
    }
    catch (\Throwable $t) 
    {
      // dd($user->id);
      // dd($t);
      DB::rollback();
        return redirect::to('ambil-barang')
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
