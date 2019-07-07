<?php

namespace JEMBATAN;

use Illuminate\Database\Eloquent\Model;

class Jemput extends Model
{
    protected $fillable = [
        'jarak', 'berat', 'prioritas','hari','id_petugas','kode_donasi'
    ];

}
