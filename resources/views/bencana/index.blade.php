
@extends('layouts.app')

@section('content')

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet"> 
  <div class='container-fluid'>
    <div class='row'>
      
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column mt-3">
              <li class="nav-item">
                <a class="nav-link " href="admin">
                  <span data-feather="home"></span>
                    Admin 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="bencana">
                  <span data-feather="file"></span>
                  Daftar Bencana
                </a>
              </li>  
              <li class="nav-item">
                <a class="nav-link active" href="petugas">
                  <span data-feather="file"></span>
                  Daftar Petugas <span class="sr-only">(current)</span>
                </a>
              </li>  
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10   pt-3 px-4 bg-white">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          
          <h2>Daftar Petugas</h2>
          <div class="table-responsive">
            <table id='riwayat' class="table table-striped table-bordered" style="width:100%">
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
          </div>
          
          </div>
        </main>


    </div>
  </div>
  
  <script>
    $(document).ready( function () {
      $('#riwayat').DataTable();
    } );
  </script>
@endsection