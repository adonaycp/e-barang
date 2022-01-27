<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id_category';
    public $timestamps = false;

    protected $fillable = [
        'id_category',
        'nama_category',
        'status'
    ];

    public function getViewCategory() {
        $data = DB::table('category')
            ->get();
    
        return $data;
    }

    public function getKategoriTersedia()
    {
        return DB::table('category')->where('status','Digunakan');
    }
}


