<?php

use Illuminate\Database\Seeder;
use JEMBATAN\Bencana;


class BencanasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bencana::create([
            'nama_bencana' => 'bencana 1',
            'deskripsi' => 'deskripsi 1',
            'batas_waktu' => '2018-12-06',
        ]);
    }
}
