<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Suara;
use DB;
use Auth;

class SuaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suara = new Suara;

        $data = $suara->getViewDataSuara();

        return view('suara.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suara = new Suara;

        $kecamatans = $suara->getDataSelectKecamatan();

        return view('suara.create', compact('kecamatans'));
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

        $kode_kec = $request->input('kecamatan_id');
        $kode_kel = $request->input('kelurahan_id');
        $no_tps = $request->input('no_tps');
        $tgl_input = date("Y-m-d");
        $operator_input = $user->id;
        $paslon_1 = $request->input('paslon_1');
        $paslon_2 = $request->input('paslon_2');
        $suara_tdk_sah = $request->input('suara_tdk_sah');
        $jmlh_suara = $request->input('jmlh_suara');
        $inputan = 1;

        DB::beginTransaction();

        try {
            $suara = Suara::create([
                'kode_kec' => $kode_kec,
                'kode_kel' => $kode_kel,
                'no_tps' => $no_tps,
                'tgl_input' => $tgl_input,
                'operator_input' => $operator_input,
                'paslon_1' => $paslon_1,
                'paslon_2' => $paslon_2,
                'suara_tdk_sah' => $suara_tdk_sah,
                'jmlh_suara' => $jmlh_suara,
                'inputan' => $inputan
            ]);

            $suara->save();

            DB::commit();

            return redirect::to('suara')
                ->with('success','Data berhasil disimpan.');
        } catch (\Throwable $t) {
            DB::rollback();
            return redirect::to('suara')
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

    public function getDataSelectKelurahan(Request $request)
    {
        if($request->ajax()){
            $kecamatan_id = $request->kecamatan_id;

            $kelurahans = DB::table("kelurahan")
                  ->selectRaw("CONCAT (kode_kel, ' | ' , nama_kel) AS kode_nama_kel, kelurahan_id")
                  ->where('kecamatan_id', '=' , $kecamatan_id)
                  ->pluck('kode_nama_kel', 'kelurahan_id')
                  ->prepend('--- Pilih Kelurahan ---', '');

            $data['kelurahan_id'] = view('select-kelurahan', compact('kelurahans'))->render();

            return response()->json($data);
        }
    }
}
