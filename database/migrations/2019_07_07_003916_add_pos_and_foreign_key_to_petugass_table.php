<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPosAndForeignKeyToPetugassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('petugass', function (Blueprint $table) {
            $table->unsignedInteger('id_pos');
            $table->foreign('id_pos')->references('id')->on('pos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('petugass', function (Blueprint $table) {
            //
        });
    }
}
