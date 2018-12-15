
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

  <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="dashboard.html">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Riwayat Donasi
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Lacak Donasi
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 bg-white">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>

          <!--<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->

          <h2>Riwayat Donasi</h2>
          <div class="table-responsive">
            <table class="table table-striped">
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
                  @foreach($donasis as $donasi)
                  <tr>
                      <td>{{$donasi->kode_donasi}}</td>
                      <td>{{$donasi->id_bencana}}</td>
                      <td>{{$donasi->created_at->format('d/m/Y')}}</td>
                      <td>{{$donasi->alamat}}</td>
                      <td>{{$donasi->no_resi}}</td>
                      <td>{{$donasi->status}}</td>
                      <td><a href="{{ route('donasi.show',$donasi->kode_donasi)}}" class="btn btn-primary">Detail</a></td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>


  
 <div>
@endsection