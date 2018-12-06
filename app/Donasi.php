<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $primaryKey = 'kode_donasi';

    protected $fillable=['status','alamat','kecamatan','kabupaten',
    'provinsi','no_resi', 'tanggal_jemput','id_donatur','id_bencana','id_petugas'];

    public function barang()
    {
        return $this->hasMany('App\Barang');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
