<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasis', function (Blueprint $table) {
            $table->increments('kode_donasi');
            $table->string('status');
            $table->string('alamat');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('no_resi')->nullable();
            $table->datetime('tanggal_jemput')->nullable();
            $table->integer('id_donatur')->unsigned();
            $table->integer('id_bencana')->unsigned();
            $table->integer('id_petugas')->nullable();
            $table->foreign('id_donatur')->references('id')->on('users');
            $table->foreign('id_bencana')->references('id')->on('bencanas');
            $table->foreign('id_petugas')->references('id_petugas')->on('petugass');
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
        Schema::dropIfExists('donasis');
    }
}
