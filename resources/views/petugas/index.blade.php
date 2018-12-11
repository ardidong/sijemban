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
  <h1>Daftar Petugas </h1>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nama</td>
          <td>Alamat</td>
          <td>Nomor HP</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($petugas as $ptg)
        @if ($ptg->hasRole('petugas'))
        <tr>
            <td>{{$ptg->id}}</td>
            <td>{{$ptg->name}}</td>
            <td>{{$ptg->alamat}}</td>
            <td>{{$ptg->no_telepon}}</td>
            <td><a href="{{ route('petugas.edit',$ptg->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('petugas.destroy', $ptg->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
  </table>
<div>
@endsection