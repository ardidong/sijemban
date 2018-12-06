<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable =['id_barang','jenis','nama','jumlah','kode_donasi'];
    
    public function donasi(){
        return $this->belongsTo(Donasi::class);
    }
}
  