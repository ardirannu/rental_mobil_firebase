<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesananberhasil extends Model
{
    protected $table = 'pesanan_berhasil';

    protected $fillable = ['pesanan_id', 'invoice']; 

    public function pesanan(){
        return $this->belongsTo('App\Models\Pesanan');
    }   
}
