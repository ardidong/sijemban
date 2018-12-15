
@extends('layouts.app')

@section('content')
    <div class="container">
        
        <div class='row mt-5 '>
            <div class='col-md-7 offset-md-3'>
                <div class='card shadow mb-5 bg-white rounded'>
                    <div class='card-header bg-danger text-white'><h2>Formulir Donasi</h2></div>
                    <div class='card-body'>
                        <div class='row'>
                            <div class='col-md-12'>
                                 <form method="post" action="{{ route('donasi.store') }}" name="add_donasi" id="add_donasi">
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

                                <h3 for="barang">Barang </h3>
                                <div class='form-group' id='dynamic_field'>
                                 
                                        <label for="Jenis">Jenis Barang</label>
                                        <select class='form-control' name="jenis" >
                                            <option value="distribusi">Barang Siap Distribusi</option>
                                            <option value="aksi">Barang Aksi Kemanusiaan</option>
                                            <option value="bernilai">Barang Bernilai</option>
                                        </select>  
                                    
                                        <label for="namabarang">Nama Barang</label>
                                        <input class='form-control' type="text" name="namabarang" >
                                    
                                        <label for="jumlahbrg">Jumlah Barang</label>
                                        <input class='form-control' type="number" name="jmlbarang" >
                                    
                                </div> 
                                    
                                    <button type="button" name="add" id="add" class='btn btn-success'>Tambah</button>

                                <input type="submit" class="btn btn-primary" value="Submit" >
                              </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){   
            var postURL = "<?php echo url('donasi'); ?>";   
            var i=1;  


            $('#add').click(function(){  
                i++;  
                $('#dynamic_field').append('<div id="field'+i+'"><br><h3 for="barang">Barang</h3> <hr><label for="Jenis">Jenis Barang</label><select class="form-control" name="jenis[]" id="jenis"><option value="distribusi">Barang Siap Distribusi</option><option value="aksi">Barang Aksi Kemanusiaan</option><option value="bernilai">Barang Bernilai</option></select><label for="namabarang">Nama Barang</label><input class="form-control" type="text" name="namabarang[]" id="namabarang"><label for="jumlahbrg">Jumlah Barang</label><input class="form-control" type="number" name="jmlbarang[]" id="jmlbarang"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div>');  
            
            });  


            $(document).on('click', '.btn_remove', function(){  
                var button_id = $(this).attr("id");   
                $('#field'+button_id+'').remove();  
            });     

           /* $('#submit').click(function(){            
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
                                $('.dynamic-added').remove();
                                $('#add_donasi')[0].reset();
                                $(".print-success-msg").find("ul").html('');
                                $(".print-success-msg").css('display','block');
                                $(".print-error-msg").css('display','none');
                                $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                            }
                        }  
                });  
            });  

*/
          });  
      </script>
    @endsection
       
