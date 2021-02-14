<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rencana', 255);
            $table->bigInteger('jumlah_dana');
            $table->integer('jumlah_wisatawan');
            $table->dateTime('tanggal_wisata');
            $table->integer('lama_wisata');
            $table->string('latitude_berangkat', 255);
            $table->string('longitude_berangkat', 255);
            $table->bigInteger('kendaraan_id');
            $table->integer('jumlah_kendaraan');
            $table->bigInteger('wisata_id');
            $table->string('pengunjung_id');
            $table->softDeletes();
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
        Schema::dropIfExists('plans');
    }
}
