<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobil', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('warna');
            $table->string('gambar');
            $table->string('tahun');
            $table->string('nomor_polisi');
            $table->bigInteger('harga_dalam_kota_lepas_kunci');
            $table->bigInteger('harga_dalam_kota_tidak_lepas_kunci');
            $table->bigInteger('harga_luar_kota_lepas_kunci');
            $table->bigInteger('harga_luar_kota_tidak_lepas_kunci');
            $table->bigInteger('harga24jam_dalam_kota_lepas_kunci');
            $table->bigInteger('harga24jam_luar_kota_lepas_kunci');
            $table->string('fasilitas');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobil');
    }
}
