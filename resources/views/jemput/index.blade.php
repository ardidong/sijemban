
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
                  Daftar Donasi <span class="sr-only">(current)</span>
                </a>
              </li>
            </ul>

          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10   pt-3 px-4 bg-white">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>

          <h2>Daftar Jemput</h2>
          <div class="table-responsive">
          <div class='row'>
            <button  id='detail' nama='detail' class="btn btn-outline-primary mb-2">Detail </button>
            <button  id='verifikasi' nama='verifikasi' class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#myModal">Verifikasi </button>
            <button  id='baru' nama='baru' class="btn btn-outline-success mb-2" >Buat Jadwal Baru </button>
           </div>
           <div   >
            <label for="Total Berat">Total Berat : {{$total[0]->totBerat}} Kg</label>
            <label for="Total Jarak">Total Jarak : {{($total[0]->totJarak)/1000}} Km</label>
           </div>
            <table id='tabel' class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                    <td>Urutan</td>
                    <td>Kode Donasi</td>
                    <td>Nama Donatur</td>
                    <td>Nama Bencana</td>
                    <td>Alamat</td>
                    <td>Jarak (m)</td>
                    <td>Berat (kg)</td>
                    <td>Nomor Resi</td>
                    <td>Status</td>
                  </tr>
              </thead>
              <tbody>
                  {{$i=1}}
                  @foreach($jemputs as $jemputan)
                  <tr>
                      <td>{{$i}}</td>
                      <td>{{$jemputan->kode_donasi}}</td>
                      <td>{{$jemputan->name}}</td>
                      <td>{{$jemputan->nama_bencana}}</td>
                      <td>{{$jemputan->alamat}}</td>
                      <td>{{$jemputan->jarak}}</td>
                      <td>{{$jemputan->berat}}</td>
                      <td>{{$jemputan->no_resi}}</td>
                      <td>{{$jemputan->status}}</td>
                      {{$i++}}
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
  <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
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

          var lokasi = '{{ route("jemput.show", "id") }}';
          lokasi = lokasi.replace('id',data[0][1]);
          window.location.href = lokasi;
        } );

        $('#baru').click( function () {
          var lokasi = '{{ route("jemput.create") }}';
          window.location.href = lokasi;
        } );

        $('#verifikasi').click( function () {
          var data = table.rows('.selected').data();
          if(data[0][8]=='Diajukan'){
            $(".modal-body").append("<b>Apakah anda yakin ingin melakukan verikasi?</b>");
            $(".modal-footer").append('<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> <button type="button" class="btn btn-primary" id="save" >Simpan</button>');
            $("#myModal").modal('handleUpdate');
            $('#save').click( function () {
              var data = table.rows('.selected').data();
              var lokasi = "{{ route('jemput.edit', 'id') }}";
              lokasi = lokasi.replace('id',data[0][1]);
              window.location.href = lokasi;
            });

          }else{
            $(".modal-body").append("<b>Donasi Sudah diverifikasi</b>");
            $(".modal-footer").append('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>');
            $("#myModal").modal('handleUpdate');
          }
        } );


    } );
  </script>
@endsection
