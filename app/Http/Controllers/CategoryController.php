<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use DB;
use Auth;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $category = Category::get()->all();
    // $category = Category::get();
    // $category2 = Category->getViewCategory();

    // dd($category2);die;

    return view('category.index', compact('category'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $category = new Category;

    return view('category.create');
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

        $nama_category = $request->input('nama_category');
        $status = $request->input('status');
        $list_nama_category = DB::table('category')->pluck('nama_category')->toArray();

        // var_dump($list_nama_category);die;

        // memeriksa nama kategori
        if (in_array($nama_category, $list_nama_category))
        {
            // return redirect()->route('category')->with('pesan','nama kategori telah digunakan!');
            return redirect::to('category')
            ->with('warning','nama kategori telah digunakan!');
            die;
        }

        // dd($nama_category);
        DB::beginTransaction();

        try {
            $category = Category::create([
            'nama_category' => $nama_category,
            'status' => $status,
            ]);

            $category->save();

            DB::commit();

            return redirect::to('category')
            ->with('success','Data berhasil disimpan.');
        } 
        catch (\Throwable $t) {
            DB::rollback();
            return redirect::to('category')
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
    public function edit($id_category)
    {
        $user = Auth::user();
        $categories = DB::table('category')->where('id_category', $id_category)->first();

        return view('category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_category)
    {
        $categories = DB::table('category')->where('id_category', $id_category)->update([
            'nama_category' => $request->nama_category,
            'status' => $request->status,
        ]);
        
        return redirect('category')->with('success', 'Data Sudah Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_category)
    {
        $user = Auth::user();
        $categories = DB::table('category')->where('id_category', $id_category)->delete();
        return redirect('category')->with('success', 'Data Berhasil Dihapus');
        
    }
    
}
