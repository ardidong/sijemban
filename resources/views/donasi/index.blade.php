
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
            <td>{{$donasi->kode_donasi}}</td>
            <td>{{$donasi->id_bencana}}</td>
            <td>{{$donasi->created_at}}</td>
            <td>{{$donasi->no_resi}}</td>
            <td>{{$donasi->status}}</td>
            <td><a href="{{ route('donasi.edit',$donasi->kode_donasi)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('donasi.destroy', $donasi->kode_donasi)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
 <div>
@endsection