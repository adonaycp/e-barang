<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Suara extends Model
{
    protected $table = 'data_suara';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'kecamatan_id',
        'kode_kec',
        'kelurahan_id',
        'kode_kel',
        'tps_id',
        'no_tps',
        'tgl_input',
        'operator_input',
        'operator_contact',
        'tgl_edit',
        'operator_edit',
        'paslon_1',
        'paslon_2',
        'suara_sah',
        'suara_tdk_sah',
        'jmlh_suara',
        'message_id',
        'message',
        'inputan'
    ];

    public function getDataSelectKecamatan() {

        $data = DB::table('kecamatan')
            ->selectRaw("nama_kec, kode_kec")
            ->pluck('nama_kec', 'kode_kec')
            ->prepend('--- Pilih kecamatan ---', '');

        return $data;
    }

    public function getViewDataSuara() {
        $data = DB::table('view_suara')
            ->get();

        return $data;
    }
}
