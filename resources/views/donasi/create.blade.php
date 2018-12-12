
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>DONASI </h1>
        <div class='row '>
            <div class='col-md-7 offset-md-3'>
                <div class='card'>
                    <div class='card-header bg-danger text-white'><h2>Formulir Donasi</h2></div>
                    <div class='card-body'>
                        <div class='row'>
                            <div class='col-md-12'>
                              <form method="POST" action="{{ route('donasi.store') }}">
                                @csrf

                                <div class='form-group'>
                                  <label for="Alamat">Alamat</label>
                                  <textarea class='form-control' name="alamat" id="alamat" required></textarea>
                                </div> 

                                <div class='form-group'>
                                  <label for="kecamatan">Kecamatan</label>
                                  <input type="text" class='form-control' name="kecamatan" id="kecamatan" required>
                                </div>     

                                <div class='form-group'>
                                  <label for="kabupaten">Kabupaten</label>
                                  <input type="text" class='form-control' name="kabupaten" id="kabupaten" required>
                                </div>     

                                <div class='form-group'>
                                  <label for="provinsi">Provinsi</label>
                                  <input type="text" class='form-control' name="provinsi" id="provinsi" required>
                                </div>     

                                  <hr>    
                                <h3 for="barang">Barang</h3>
                                <div class='form-group' id='dynamic_field'>
                                    <div>
                                    <label for="Jenis">Jenis Barang</label>
                                    <select class='form-control' name="jenis[]" id="jenis[]">
                                        <option value="distribusi">Barang Siap Distribusi</option>
                                        <option value="aksi">Barang Aksi Kemanusiaan</option>
                                        <option value="bernilai">Barang Bernilai</option>
                                    </select>  
                                
                                    <label for="namabarang">Nama Barang</label>
                                    <input class='form-control' type="text" name="namabarang[]" id="namabarang[]">
                                
                                    <label for="jumlahbrg">Jumlah Barang</label>
                                    <input class='form-control' type="number" name="jmlbarang[]" id="jmlbarang[]">
                                    </div>
                                    
                                </div>
                                    <button type="button" name="add" id="add" class='btn btn-success'>Tambah</button>

                                <button type="submit" class="btn btn-primary">Ajukan</button>
                              </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){      
            var i=1;  


            $('#add').click(function(){  
                i++;  
                $('#dynamic_field').append('<div id="field'+i+'"><hr><label for="Jenis">Jenis Barang</label><select class="form-control" name="barang_jenis[]" id="jenis[]"><option value="distribusi">Barang Siap Distribusi</option><option value="aksi">Barang Aksi Kemanusiaan</option><option value="bernilai">Barang Bernilai</option></select><label for="namabarang">Nama Barang</label><input class="form-control" type="text" name="barang_nama[]" id="namabarang[]"><label for="jumlahbrg">Jumlah Barang</label><input class="form-control" type="number" name="barang_jumlah[]" id="jmlbarang[]"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div>');  
            
            });  


            $(document).on('click', '.btn_remove', function(){  
                var button_id = $(this).attr("id");   
                $('#field'+button_id+'').remove();  
            });     
          });  
      </script>
    @endsection
       
