<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class BeliBarang extends Model
{
    protected $table = 'belibarang';
    protected $primaryKey = 'id_belibarang';
    public $timestamps = false;
  
    protected $fillable = [
        'id_belibarang',
        'id_barang',
        'id_category',
        'item',
        'hrg_satuan',
        'hrg_jumlah',
        'tgl_beli',
        'operatorinput'
    ];
    /**
      * untuk menampilkan nama kategori di tabel jenis barang
      */
    public function namaKategori() 
    {
      return $this->belongsTo('App\Category', 'id_category');
    }
  
    /**
      * untuk menampilkan nama barang di tabel jenis belibarang
      */
    public function namaBarang() 
    {
      return $this->belongsTo('App\Barang', 'id_barang');
    }
}
