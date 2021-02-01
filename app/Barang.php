<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nama_brg',
        'item',
        'hrg_satuan',
        'hrg_jumlah',
        // 'id_jenis',
        'tgl_input',
        'tgl_update',
        'tgl_pembelian',
        'operatorinput',
        'tahun'
    ];

    public function getViewBarang() {
        $data = DB::table('barang')
            ->get();
    
        return $data;
    }
}
