<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mobil_id');
            $table->foreign('mobil_id')->references('id')->on('mobil');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('opsi_pesanan');
            $table->string('tgl_pesan');
            $table->string('total_bayar');
            $table->string('resi');
            $table->string('status_pesanan');
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
        Schema::dropIfExists('pesanan');
    }
}
