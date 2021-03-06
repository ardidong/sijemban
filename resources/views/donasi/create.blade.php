
@extends('layoutsumum')

@section('headscript')

<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
@endsection

@section('content')
    <div class="container" style="margin-top:100px;">

        <div class='row mt-5 '>
            <div class='col-md-7 offset-md-3'>
                <div class='card shadow mb-5 bg-white rounded'>
                    <div class='card-header text-white' style="background-color:#119bff;"><h2>Formulir Donasi</h2></div>
                    <div class='card-body'>
                        <div class='row'>
                            <div class='col-md-12'>

                                <div class='form-group'>
                                    <label for="Nama Bencana">Bencana : </label>
                                    <span><strong>{{$bencana->nama_bencana}}</strong></span>
                                </div>

                                 <form method="post" action="" name="add_donasi" id="add_donasi">
                                @csrf

                                <div class='form-group'>
                                  <label for="Alamat">Alamat</label>
                                  <textarea class='form-control' name="alamat" id="alamat" required></textarea>
                                </div>

                                <div id="map-canvas">
                                </div>

                                <input class='invisible' type="number" name="id_bencana" id="id_bencana" value='{{$bencana->id}}'>
                                <input class='invisible' type="text" name="latitude" id="latitude">
                                <input class='invisible' type="text" name="longitude" id="longitude">
                                <input class='invisible' type="text" name="kecamatan" id="kecamatan">
                                <input class='invisible' type="text" name="kabupaten" id="kabupaten">
                                <input class='invisible' type="text" name="provinsi" id="provinsi">

                                <hr>

                                <h3 for="barang">Barang </h3>
                                <div class='form-group' id='dynamic_field'>

                                        <label for="Jenis">Jenis Barang</label>
                                        <select class='form-control' name="jenis[]" >
                                            <option value="konsumsi">Barang Konsumsi</option>
                                            <option value="kebutuhan">Barang Kebutuhan Pokok</option>
                                            <option value="peralatan">Peralatan Darurat(genset, tenda)</option>
                                            <option value="obat">Barang Medis Obat Obatan</option>
                                            <option value="bernilai">Barang Bernilai</option>
                                        </select>

                                        <label for="namabarang">Nama Barang</label>
                                        <input class='form-control' type="text" name="namabarang[]" >

                                        <label for="jumlahbrg">Jumlah Barang</label>
                                        <input class='form-control' type="number" name="jmlbarang[]" >

                                        <label for="brtbrg">Berat Barang(kg)</label>
                                        <input class='form-control' type="number" name="brtbarang[]" >

                                </div>
                                <div class="mb-2">
                                    <button type="button" name="add" id="add" class='btn btn-success'>Tambah Barang</button>
                                </div>

                                <input type="button" id="submit" name='submit' class="btn btn-primary" value="Submit" >
                              </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            #map-canvas {
                width: 100%;
                height: 400px;
            }
        </style>
        <script src="{{ asset('js/map.js') }}" ></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=[API-KEY]&callback=initMap">
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
            var postURL = "{{ route('donasi.store') }}";
            var i=1;


            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<div id="field'+i+'"><br><h3 for="barang">Barang</h3><hr><label for="Jenis">Jenis Barang</label><select class="form-control" name="jenis[]" id="jenis"><option value="konsumsi">Barang Konsumsi</option><option value="kebutuhan">Barang Kebutuhan Pokok</option><option value="peralatan">Peralatan Darurat(genset, tenda)</option><option value="obat">Barang Medis Obat Obatan</option><option value="bernilai">Barang Bernilai</option></select><label for="namabarang">Nama Barang</label><input class="form-control" type="text" name="namabarang[]"><label for="jumlahbrg">Jumlah Barang</label><input class="form-control" type="number" name="jmlbarang[]"><label for="brtbrg">Berat Barang(kg)</label><input class="form-control" type="number" name="brtbarang[]" ><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove offset-md-11 mt-3">X</button></div>');
            });


            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#field'+button_id+'').remove();
            });

            $('#submit').click(function(){
                    $.ajax({
                            url:postURL,
                            method:"POST",
                            data:$('#add_donasi').serialize(),
                            type:'json',
                            success:function(data)
                            {
                                if(data.error){
                                    printErrorMsg(data.error);
                                }else{
                                    i=1;
                                    $('#add_donasi')[0].reset();
                                    window.location.replace("/donasi");
                                }
                            }

                    });
                });

          });
      </script>
    @endsection
