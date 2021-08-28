<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    
    protected $table = 'pesanan';

    protected $fillable = ['pelanggan_id', 'alamat_pelanggan_id', 'total_pembayaran', 'resi_pembayaran', 'status', ]; 

    public function pelanggan(){
        return $this->belongsTo('App\Pelanggan');
    }   

    public function alamat_pelanggan(){
        return $this->belongsTo('App\Models\Alamatpelanggan');
    }   

    public function pesanan_detail(){
        return $this->hasMany('App\Models\Pesanandetail');
    }

    public function pesanan_berhasil(){
        return $this->hasOne('App\Models\Pesananberhasil');
    }   
}
 