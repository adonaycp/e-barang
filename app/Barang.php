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
    'tgl_input',
    'tgl_update',
    'tgl_pembelian',
    'operatorinput',
    'tahun',
    'id_category'
  ];
  /**
   * untuk menampilkan nama kategori di tabel jenis barang
   */
  public function namaKategori() 
  {
    return $this->belongsTo('App\Category', 'id_category');
  }


  public function getViewBarang() {
    $data = DB::table('barang')
      ->get();
    
      return $data;
  }
}
