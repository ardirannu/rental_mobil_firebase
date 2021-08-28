<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Alamatpelanggan extends Model
{
    protected $table = 'alamat_pelanggan';

    protected $fillable = ['pelanggan_id', 'nama_jalan', 'provinsi', 'kota', 'kode_pos']; 

    public function pelanggan(){
        return $this->belongsTo('App\Pelanggan');
    }   

    public function pesanan(){
        return $this->hasMany('App\Models\Pesanan');
    }   
} 
