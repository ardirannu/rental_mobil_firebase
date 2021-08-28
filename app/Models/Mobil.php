<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';

    protected $fillable = ['nama', 'warna', 'gambar', 'tahun', 'nomor_polisi', 'harga_dalam_kota_lepas_kunci', 
     'harga_dalam_kota_tidak_lepas_kunci', 'harga_luar_kota_lepas_kunci', 'harga_luar_kota_tidak_lepas_kunci', 
     'harga24jam_dalam_kota_lepas_kunci	', 'harga24jam_luar_kota_lepas_kunci', 'fasilitas', 'keterangan'];

    public function setFasilitasAttribute($value)  
    {
        $this->attributes['fasilitas'] = json_encode($value);
    }
 
    public function getFasilitasAttribute($value)
    {
        return $this->attributes['fasilitas'] = json_decode($value);
    }
    // public function setWarnaAttribute($value)
    // {
    //     $this->attributes['warna'] = json_encode($value);
    // }
 
    // public function getWarnaAttribute($value)
    // {
    //     return $this->attributes['warna'] = json_decode($value);
    // }

}
