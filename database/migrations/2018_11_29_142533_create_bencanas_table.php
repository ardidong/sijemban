<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBencanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bencanas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('batas_waktu');
            $table->string('nama_bencana');
            $table->string('deskripsi');   
            $table->string('cover')->nullable(); 
            $table->string('status'); 
            $table->string('slug',100);
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
        Schema::dropIfExists('bencanas');
    }
}
