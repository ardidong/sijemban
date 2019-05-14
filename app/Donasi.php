<?php

namespace JEMBATAN;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    protected $primaryKey = 'kode_donasi';

    protected $fillable=['status','alamat','latitude','longitude',
    'no_resi', 'tanggal_jemput','id_donatur','id_bencana','id_petugas'];

    public function barang()
    {
        return $this->hasMany(Barang::class,'kode_donasi');
    }

    public function user()
    {
        return $this->belongsTo('JEMBATAN\User');
    }
}
