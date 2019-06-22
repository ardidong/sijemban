@extends('layoutsumum')


@section('content')
<div class="container shadow-lg p-3 mb-5 bg-white rounded" style="margin-top:100px;margin-bottom:20px;">
  <div class="row">
    <div class="col-8">
      <h1 id="judul">{{$bencana->nama_bencana}}</h1>
      <h5>{{$bencana->batas_waktu->diffForHumans()}}</h5>
    </div>
    <div class="col-4">
      <div align="center">
        <a href="/donasi/create/{{$bencana->id}}">
        <div style="margin: 20px 0;">
            <button type="submit" style="width:200px;" class="btn btn-primary btn-lg">Donasi</button>
        </div>
        </a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-8">
      <a href="#">
        <img src="/storage/cover/{{$bencana->cover}}" alt="Gambar" style="margin-bottom: 30px; width:730px;height:400px;">
      </a>
      <p id="artikel">{{$bencana->deskripsi}}</p>
    </div>
  </div>
</div>
