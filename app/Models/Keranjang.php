<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';

    protected $fillable = ['pelanggan_id', 'produk_id', 'warna', 'ukuran', 'jumlah']; 

    public function pelanggan(){
        return $this->belongsTo('App\Pelanggan');
    }   
    public function produk(){
        return $this->belongsTo('App\Models\Produk');
    }   
}
 