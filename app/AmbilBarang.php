<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class AmbilBarang extends Model
{
  protected $table = 'ambilbarang';
  protected $primaryKey = 'id_ambilbarang';
  public $timestamps = false;

  protected $fillable = [
    'id_category',
    'id_barang',
    'total_ambil',
    'tgl_ambil',
    'nama_pengambil',
    'bidang',
    'operatorinput',
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
    return $this->belongsTo('App\Barang', 'id');
  }


}
