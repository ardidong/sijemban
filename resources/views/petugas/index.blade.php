
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
          @if(session()->get('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}  
            </div><br />
          @endif
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          
          <h2>Daftar Petugas</h2>
          <div class="table-responsive">
            <table id='tabel' class="table table-striped table-bordered" style="width:100%">
             <thead>
                  <tr>
                    <td>ID</td>
                    <td>Nama</td>
                    <td>Alamat</td>
                    <td>Nomor HP</td>
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
                      
                  </tr>
                  @endif
                  @endforeach
              </tbody>
            </table>
          </div>
          <a type="button" class="btn btn-success" href="{{route('petugas.create')}}">Tambah Petugas</a>
          <button type="button" class="btn btn-danger" id="hapus" data-toggle="modal" data-target="#myModal">Hapus</button>
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
          
         <!-- <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
  
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
  <script>
    $(document).ready( function () {
        
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

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $('#hapus').click( function () {
          $(".modal-body").append("<b>Apakah anda yakin ingin menghapus akun petugas tersebut?</b>");
          $(".modal-footer").append('<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> <button type="button" class="btn btn-danger" id="delete" >Hapus</button>');
          $("#myModal").modal('handleUpdate');
          $('#delete').click( function () {
            var xdata = table.rows('.selected').data();
            var deleteUrl = "{{ route('petugas.destroy', 'id') }}";
            deleteUrl = deleteUrl.replace('id',xdata[0][0  ]);
            $.ajax({
                url: deleteUrl,
                //type: 'DELETE',
                type: "POST",
                data:{
                _method:"DELETE"
                },
                success: function(result) {
                  
                  location.reload();
                 //   alert("Berhasil dihapus!");
                }
            });
          });
        } );
        
    } );
  </script>
@endsection