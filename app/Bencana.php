<?php

namespace JEMBATAN;

use Illuminate\Database\Eloquent\Model;

class Bencana extends Model
{
    protected $dates = ['batas_waktu'];
    protected $fillable=['batas_waktu','nama_bencana','deskripsi','status','cover'];
}
