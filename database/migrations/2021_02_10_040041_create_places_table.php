<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata', 255);
            $table->integer('harga_tiket');
            $table->text('alamat');
            $table->text('deskripsi');
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('pengelola');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
