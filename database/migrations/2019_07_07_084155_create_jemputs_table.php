<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJemputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jemputs', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('jarak',8,2);
            $table->decimal('berat',8,2);
            $table->decimal('prioritas',8,2);
            $table->datetime('hari');
            $table->unsignedInteger('kode_donasi');
            $table->unsignedInteger('id_petugas');
            $table->foreign('kode_donasi')->references('kode_donasi')->on('donasis');
            $table->foreign('id_petugas')->references('id')->on('users');
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
        Schema::dropIfExists('jemputs');
    }
}
