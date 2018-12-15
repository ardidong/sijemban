
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
            <td>{{$donasi->created_at->format('d/m/Y')}}</td>
            <td>{{$donasi->no_resi}}</td>
            <td>
              @if($donasi->status=='Diajukan')
                <button type="button" class="btn btn-light border border-primary .mx-auto"> <strong>Diajukan</strong></button>
              @endif
              @if($donasi->status=='Dijemput')
                <button type="button" class="btn btn-light border border-success .mx-auto"> <strong>Dijemput</strong></button>
              @endif
            </td>
            <td><a href="{{ route('jemput.show',$donasi->kode_donasi)}}" class="btn btn-primary">Detail</a>
              @if($donasi->status == 'Diajukan')
                <a href="{{ route('jemput.edit',$donasi->kode_donasi)}}" class="btn btn-success" onclick="return confirm('Konfirmasi Verifikasi')">Verifikasi</a>
              @endif
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
 <div>
@endsection