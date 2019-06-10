
@extends('layoutsumum')

@section('content')
    <div class="container">
        <div class='row mt-5'  style="margin-bottom:100px">
            <div class='col-md-12 '>
                <div class='card shadow mb-5 bg-white rounded' style="margin-top: 50px;">
                    <div class='card-body' style="background: #119bff">
                        <div class='row'>
                            <div class='col-md-12'>
                                <form method="get" action="" name="resi" id="resi">
                                @csrf
                                <div class='form-group'>
                                    <p  class="text-center text-white"><b>Nomor Resi</b></p>
                                    <div class="row">
                                        <input class='form-control col-md-7 offset-2 ' name="noResi" id="noResi" placeholder="Masukkan Nomor Resi" required >
                                        <button type="button" id="cari" name='cari' class="btn ml-3 float-right" style="background : #ffffff"  >Cari</button>
                                    </div>
                                </div>
                              </form>
                           </div>
                        </div>
                    </div>
                </div>

                <div id='hasil' class='card shadow mb-5 bg-white rounded'>
                    <div class='card-body' >
                        <div class='row'>
                            <div class='col-md-12'>
                            <table id='riwayat' class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <td>id</td>
                                        <td>ID Bencana</td>
                                        <td>Tanggal Pengajuan</td>
                                        <td>Alamat</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="fill">

                                    </tr>
                                </tbody>
                                </table>
                           </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

        <script>
            $(document).ready(function() {
                var cariURL = "{{ route('lacak.create') }}";
                $("#cari").click(function() {

                    $.ajax({    //create an ajax request to display.php
                        method: "GET",
                        url: cariURL,
                        data:$('#resi').serialize(),
                        type:'json',
                        success: function(response){
                            $('#fill').html("");
                            var hasil = JSON.parse(response);
                            if(hasil.length!=0){
                                $(hasil).each(
                                function() {
                                    $('#fill').append(
                                            '<td>'+ this.kode_donasi
                                                    + '</td><td>'
                                                    + this.id_bencana
                                                    + '</td><td>'
                                                    + this.created_at
                                                    + '</td><td>'
                                                    + this.alamat
                                                    + '</td><td>'
                                                    + this.status
                                                    + '</td></tr>')
                                });
                            }else{
                                $('#fill').append('<td colspan="5">Data Tidak Ditemukan</td>');

                            }
                        }

                   });
                });
            });
        </script>
    @endsection
