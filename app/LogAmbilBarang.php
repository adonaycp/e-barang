<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogAmbilBarang extends Model
{
    protected $table = 'log_ambilbarang';
    protected $primaryKey = 'id_log';
    public $timestamps = false;

    protected $fillable = [
        'id_ambilbarang',
        'id_barang',
        'id_category',
        'total_awal',
    ];
}
