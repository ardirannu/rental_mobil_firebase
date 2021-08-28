<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanandetail extends Model
{
    protected $table = 'pesanan_detail';

    protected $fillable = ['produk_id', 'pesanan_id', 'warna', 'ukuran', 'jumlah']; 

    public function pesanan(){
        return $this->belongsTo('App\Models\Pesanan');
    }   

    public function produk(){
        return $this->belongsTo('App\Models\Produk');
    } 
}
