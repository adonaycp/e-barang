<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Barang;
use App\Category;
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
    /**
        * untuk menampilkan nama kategori di tabel jenis barang
        */
        $barang = Barang::with('namaKategori')->get();

        return view('barang.index', compact('barang'));
    }

    /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
    public function create()
    {
        // $barang = new Barang;
        // $jenis = $barang->getDataSelectCategory();
        
        $categories = Category::all();

        return view('barang.create', compact('categories'));
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
        $nama_brg = $request->input('nama_brg');
        $item = $request->input('item');
        $hrg_satuan = $request->input('hrg_satuan');
        $hrg_jumlah = $request->input('hrg_jumlah');
        $tgl_input = date("Y-m-d", strtotime($request->tgl_input));
        $tgl_update = date("Y-m-d", strtotime($request->tgl_update));
        $tgl_pembelian = date("Y-m-d", strtotime($request->tgl_pembelian));
        $operatorinput = $user->id;
        $tahun = $request->input('tahun');
        $id_category = $request->input('id_category');

        DB::beginTransaction();

        try 
        {
        $barang = Barang::create([
        'nama_brg' => $nama_brg,
        'item' => $item,
        'hrg_satuan' => $hrg_satuan,
        'hrg_jumlah' => $hrg_jumlah,
        'tgl_input' => $tgl_input,
        'tgl_update' => $tgl_update,
        'tgl_pembelian'=> $tgl_pembelian,
        'operatorinput' => $operatorinput,
        'tahun' => $tahun,
        'id_category' => $id_category
        ]);

        $barang->save();
        // dd($barang);
        DB::commit();
            return redirect::to('barang')
            ->with('success','Data berhasil disimpan.');
        }
        catch (\Throwable $t) 
        {
        // dd($user->id);
        // dd($t);
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
    public function edit($id_barang)
    {
        $categories = Category::all();
        $barangs = DB::table('barang')->where('id_barang', $id_barang)->first();

        return view('barang.edit', compact('barangs', 'categories'));
    }

    /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function update(Request $request, $id_barang)
    {
        // $barangs = Barang::all();
        $categories = Category::all();
        $user = Auth::user();

        $barangs = DB::table('barang')->where('id_barang', $id_barang)->update([

            'nama_brg' => $request->nama_brg,
            'item' => $request->item,
            'hrg_satuan' => $request->hrg_satuan,
            'hrg_jumlah' => $request->hrg_jumlah,
            'tgl_input' => $request->tgl_input,
            // 'tgl_update' => $request->tgl_update,
            'tgl_pembelian'=> $request->tgl_pembelian,
            'operatorinput' => $user->id,
            'tahun' => $request->tahun,
            'id_category' => $request->id_category
        ]);
        
        return redirect('barang')->with('success', 'Data Sudah Terupdate');
    }

    /**
        * Remove the specified resource from storage.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
    public function destroy($id_barang)
    {
        $user = Auth::user();
        $barangs = DB::table('barang')->where('id_barang', $id_barang)->delete();
        return redirect('barang')->with('success', 'Data Berhasil Dihapus');
    }
    
}
