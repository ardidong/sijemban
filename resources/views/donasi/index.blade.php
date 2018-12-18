
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
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Riwayat Donasi <span class="sr-only">(current)</span>
                </a>
              </li>
            </ul>
            
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10   pt-3 px-4 bg-white">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          
          <h2>Riwayat Donasi</h2>
          <button  id='detail' nama='detail' class="btn btn-outline-primary mb-2">Detail </button>
          <div class="table-responsive">
            <table id='riwayat' class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                    <td>id</td>
                    <td>ID Bencana</td>
                    <td>Diajukan</td>
                    <td>Alamat</td>
                    <td>Nomor Resi</td>
                    <td>Status</td>
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
                     
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
          
          </div>
        </main>


    </div>
  </div>
  

  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
  <script>
    $(document).ready(function() {
        
      var table = $('#riwayat').DataTable();
      var row;
        $('#riwayat tbody').on( 'click', 'tr', function () {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            }
            else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
            var pos = table.row(this).index();
            var row = table.row(pos).data();
        } );
          
        $('#detail').click( function () {
          var data = table.rows('.selected').data();
       
          var lokasi = '{{ route("donasi.show", "id") }}';
          lokasi = lokasi.replace('id',data[0][0]);
         //   table.row('.selected').remove().draw( false );
          window.location.href = lokasi;
        } );
        // $('#riwayat').DataTable( {
        //  select: true
        //  } );
    } );
  </script>
@endsection