
@extends('layouts.app')

@section('content')

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
                <a class="nav-link active" href="bencana">
                  <span data-feather="file"></span>
                  Daftar Bencana <span class="sr-only">(current)</span>
                </a>
              </li>  
              <li class="nav-item">
                <a class="nav-link " href="petugas">
                  <span data-feather="file"></span>
                  Daftar Petugas 
                </a>
              </li>  
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10   pt-3 px-4 bg-white">
        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}  
          </div><br />
        @endif
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          
          <h2>Daftar Bencana</h2>
          <button  id='detail' nama='detail' class="btn btn-outline-primary mb-2">Detail </button>
          <button  id='ubah' nama='ubah' class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#myModal">Ubah Status </button>
          <div class="table-responsive">
            <table id='tabel' class="table table-striped table-bordered" style="width:100%">
             <thead>
                  <tr>
                    <td>ID</td>
                    <td>Nama</td>
                    <td>Deskripsi</td>
                    <td>Status</td>
                    <td>Batas Waktu</td>
                  </tr>
              </thead>
              <tbody>
                  @foreach($bencanas as $bencana)
                  <tr>
                      <td>{{$bencana->id}}</td>
                      <td>{{$bencana->nama_bencana}}</td>
                      <td>{{$bencana->deskripsi}}</td>
                      <td>{{$bencana->status}}</td>
                      <td>{{$bencana->batas_waktu->format('d/m/Y')}}</td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
          
          </div>
        </main>


    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Attention</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          
      </div>
    </div>
  </div>

  
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 
  <script>
    $(document).ready(function() {
        
      var table = $('#tabel').DataTable();
      var row;
        $('#tabel tbody').on( 'click', 'tr', function () {
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

        $('#ubah').click( function () {
          var data = table.rows('.selected').data();
          if(data[0][3]=='Diunggah'){
            $(".modal-body").append("<b>Apakah anda yakin ingin mengubah status bencana ?</b>");
            $(".modal-footer").append('<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> <button type="button" class="btn btn-primary" id="save" >Simpan</button>');
            $("#myModal").modal('handleUpdate');
            $('#save').click( function () {
              var data = table.rows('.selected').data();
              var lokasi = "{{ route('bencana.edit', 'id') }}";
              lokasi = lokasi.replace('id',data[0][0]);
              window.location.href = lokasi;
            });
           
          }else{
            $(".modal-body").append("<b>Apakah anda yakin ingin mengubah status bencana ?</b>");
            $(".modal-footer").append('<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> <button type="button" class="btn btn-primary" id="save" >Simpan</button>');
            $("#myModal").modal('handleUpdate');
            $('#save').click( function () {
              var data = table.rows('.selected').data();
              var lokasi = "{{ route('bencana.edit', 'id') }}";
              lokasi = lokasi.replace('id',data[0][0]);
              window.location.href = lokasi;
            });
          }
        } );

        // $('#riwayat').DataTable( {
        //  select: true
        //  } );
    } );
  </script>
@endsection