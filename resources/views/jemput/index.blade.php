
@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID Donatur</td>
          <td>Kode</td>
          <td>ID Bencana</td>
          <td>Diajukan</td>
          <td>Nomor Resi</td>
          <td>Status</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($donasis as $donasi)
        <tr>
            <td>{{$donasi->id_donatur}}</td>
            <td>{{$donasi->kode_donasi}}</td>
            <td>{{$donasi->id_bencana}}</td>
            <td>{{$donasi->created_at}}</td>
            <td>{{$donasi->no_resi}}</td>
            <td>{{$donasi->status}}</td>
            <td><a href="{{ route('donasi.edit',$donasi->kode_donasi)}}" class="btn btn-primary">Detail</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
 <div>
@endsection