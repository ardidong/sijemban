
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
                <a class="nav-link active" href="admin">
                  <span data-feather="home"></span>
                    Admin <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="bencana">
                  <span data-feather="file"></span>
                  Daftar Bencana
                </a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="petugas">
                  <span data-feather="file"></span>
                  Daftar Petugas
                </a>
              </li>  
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10   pt-3 px-4 bg-white">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          
          <h2>Daftar Bencana</h2>
          <div class="table-responsive">
            <table id='riwayat' class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                    <td>Kode</td>
                    <td>ID Bencana</td>
                    <td>Diajukan</td>
                    <td>Alamat</td>
                    <td>Nomor Resi</td>
                    <td>Status</td>
                    <td colspan="2">Action</td>
                  </tr>
              </thead>
              <tbody>
    
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