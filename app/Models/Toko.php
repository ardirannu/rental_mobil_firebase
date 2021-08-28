<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $table = 'toko';

    protected $fillable = ['nama_toko', 'nama_rekening', 'no_rekening', 'nama_bank', 'email', 'call_center' ]; 
}
