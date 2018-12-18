
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class='row '>
            <div class='col-md-7 offset-md-3 '>
                <div class='card mt-5'>
                    <div class='card-header bg-danger text-white'><h2>Data Donasi</h2></div>
                    <div class='card-body'>
                        <div class='row'>
                            <div class='col-md-12'>
                              <form method="post" >
                                @method('PATCH')
                                @csrf

                                <div class='form-group'>
                                  <label for="Alamat">Alamat :</label>
                                  <label trype="text" class='form-control' name="alamat" id="alamat" value='' >{{ $donasis->alamat }}</label>
                                </div> 

                                <div class='form-group'>
                                  <label for="kecamatan">Kecamatan :</label>
                                  <label type="text" class='form-control' name="kecamatan" id="kecamatan" value=''>{{ $donasis->kecamatan}}</label>
                                </div>     

                                <div class='form-group'>
                                  <label for="kabupaten">Kabupaten :</label>
                                  <label type="text" class='form-control' name="kabupaten" id="kabupaten" value='' >{{ $donasis->kabupaten}}</label>
                                </div>     

                                <div class='form-group'>
                                  <label for="provinsi">Provinsi :</label>
                                  <label type="text" class='form-control' name="provinsi" id="provinsi" value='' >{{ $donasis->provinsi}}</label>
                                </div>     

                                <div class='form-group'>
                                  <label for="status">Status :</label>
                                  <label type="text" class='form-control' name="status" id="status" value='' >{{ $donasis->status}}</label>
                                </div>    

                                <hr>

                                <h3 for="barang">Barang</h3>
                                <div class='form-group'>
                                    @foreach($barang as $brg)
                                        <hr>
                                        <label for="Jenis">Jenis Barang</label>
                                        @switch($brg->jenis)
                                            @case('distribusi')
                                                <span type="text" class='form-control' name="status" id="status" value='' >Barang Siap Distribusi</span>
                                                @break
                                            @case('aksi')
                                                <span type="text" class='form-control' name="status" id="status" value='' >Barang Aksi Kemanusiaan</span>
                                                @break
                                            @case('bernilai')
                                                <span type="text" class='form-control' name="status" id="status" value='' >Barang Bernilai</span>
                                                @break
                                        @endswitch
                
                                        <label for="namabarang">Nama Barang</label>
                                        <label class='form-control' type="text" name="namabarang" >{{$brg->nama}}</label>
                                    
                                        <label for="jumlahbrg">Jumlah Barang</label>
                                        <label class='form-control' type="number" name="jmlbarang" >{{$brg->jumlah}}</label>
                                    @endforeach
                                </div> 
                              </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    @endsection
       
