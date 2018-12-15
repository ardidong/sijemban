<?php

namespace JEMBATAN;

use Illuminate\Database\Eloquent\Model;

class Bencana extends Model
{
    protected $fillable=['batas_waktu','nama_bencana','deskripsi','cover'];
}
