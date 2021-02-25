<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class SaldoAwal extends Model
{
    protected $table = 'saldoawal';
    protected $primaryKey = 'id_saldoawal';
    public $timestamps = false;

    protected $fillable = [
      'id_saldoawal',
      'id_barang',
      'id_category',
      'total_ambil',
      'tgl_ambil',
      'tahun'
    ];
        /**
      * untuk menampilkan nama kategori di tabel jenis barang
      */
      public function namaKategori() 
      {
        return $this->belongsTo('App\Category', 'id_category');
      }
  
      /**
        * untuk menampilkan nama barang di tabel jenis ambilbarang
        */
      public function namaBarang() 
      {
        return $this->belongsTo('App\Barang', 'id_barang');
      }
}
