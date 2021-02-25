<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
        $ambilbarang = AmbilBarang::with(['namaBarang'], ['namaKategori'])->get();
        return view('ambil-barang.index', compact('ambilbarang'));
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
        return view('ambil-barang.create', compact('barangs'), compact('categories'));
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
        $id_category = $request->input('id_category'); //ambil dari tabel category
        $id_barang = $request->input('id_barang'); //ambil dari tabel barang
        $total_ambil = $request->input('total_ambil');
        $tgl_ambil = date("Y-m-d", strtotime($request->tgl_ambil));
        $nama_pengambil = $request->input('nama_pengambil');
        $bidang = $request->input('bidang');
        $operatorinput = $user->id;

        DB::beginTransaction();

        try
        {
            $ambilbarang = AmbilBarang::create([
            
            'id_category' => $id_category,
            'id_barang' => $id_barang,
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
     * @param  int  $id_ambilbarang
     * @return \Illuminate\Http\Response
     */
    public function edit($id_ambilbarang)
    {
      Auth::user();
      $barangs = Barang::all();
      $categories = Category::all();

      $ambilbarang = DB::table('ambilbarang')->where('id_ambilbarang', $id_ambilbarang)->first();
      // dd($editambilbarang);
      // dd($ambilbarang);
      return view('ambil-barang.edit', compact('ambilbarang','barangs', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_ambilbarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ambilbarang)
    { 
        $barangs = Barang::all();
        $categories = Category::all();
        $user = Auth::user();
        $ambilbarang = DB::table('ambilbarang')->where('id_ambilbarang', $id_ambilbarang)->update([
        'id_category' => $request->id_category,
        'id_barang' => $request->id_barang,
        'total_ambil' => $request->total_ambil,
        'tgl_ambil' => $request->tgl_ambil,
        'nama_pengambil' => $request->nama_pengambil,
        'bidang' => $request->bidang,
        'operatorinput' =>$user->id
        ]);
        
        return redirect('ambil-barang')->with('success', 'Data Sudah Terupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ambilbarang)
    {
        $user = Auth::user();
        $ambilbarang = DB::table('ambilbarang')->where('id_ambilbarang', $id_ambilbarang)->delete();
        return redirect('ambil-barang')->with('success', 'Data Berhasil Dihapus');

    }
    
}
