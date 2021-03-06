<?php

namespace JEMBATAN;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable =['id_barang','jenis','nama','jumlah','berat','kode_donasi'];

    public function donasi(){
        return $this->belongsTo(Donasi::class,'kode_donasi');
    }
}
