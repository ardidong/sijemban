
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class='row mt-5 '>
            <div class='col-md-12 '>
                <div class='card shadow mb-5 bg-white rounded'>
                    <div class='card-body' style="background: #EB413D">
                        <div class='row'>
                            <div class='col-md-12'>
                                <form method="post" action="" name="add_donasi" id="add_donasi">
                                @csrf
                                <div class='form-group'>
                                    <p for="Alamat" class="text-center text-white"><b>Nomor Resi</b></p>
                                    <div class="row">
                                        <input class='form-control col-md-7 offset-2 ' name="alamat" id="alamat" placeholder="Masukkan Nomor Resi" required >
                                        <input type="button" id="submit" name='submit' class="btn ml-3 float-right" style="background : #ffffff" value="Submit" >
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
                                <form method="post" action="" name="add_donasi" id="add_donasi">
                                @csrf
                                <div class='form-group'>
                                    <p for="Alamat" class="text-center text-white"><b>Nomor Resi</b></p>
                                    <div class="row">
                                        <input class='form-control col-md-7 offset-2 ' name="alamat" id="alamat" placeholder="Masukkan Nomor Resi" required >
                                        <input type="button" id="submit" name='submit' class="btn ml-3 float-right" style="background : #ffffff" value="Submit" >
                                    </div>
                                </div>  
                              </form>
                           </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){   
            var postURL = "{{ route('donasi.store') }}";   
            var i=1;  


                $('#add').click(function(){  
                    i++;  
                    $('#dynamic_field').append('<div id="field'+i+'"><br><h3 for="barang">Barang</h3> <hr><label for="Jenis">Jenis Barang</label><select class="form-control" name="jenis[]" id="jenis"><option value="distribusi">Barang Siap Distribusi</option><option value="aksi">Barang Aksi Kemanusiaan</option><option value="bernilai">Barang Bernilai</option></select><label for="namabarang">Nama Barang</label><input class="form-control" type="text" name="namabarang[]" id="namabarang"><label for="jumlahbrg">Jumlah Barang</label><input class="form-control" type="number" name="jmlbarang[]" id="jmlbarang"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove offset-md-11 mt-3">X</button></div>');  
                
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
                                    alert(data);
                                    $('#add_donasi')[0].reset();
                                }
                            } 
                            
                    });  
                });  
                    
          });  
      </script>
    @endsection
       
