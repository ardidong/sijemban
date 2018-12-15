
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
                                  <label for="Alamat">Alamat</label>
                                  <input trype="text" class='form-control' name="alamat" id="alamat" value='{{ $donasis->alamat }}' readonly>
                                </div> 

                                <div class='form-group'>
                                  <label for="kecamatan">Kecamatan</label>
                                  <input type="text" class='form-control' name="kecamatan" id="kecamatan" value='{{ $donasis->kecamatan}}'readonly>
                                </div>     

                                <div class='form-group'>
                                  <label for="kabupaten">Kabupaten</label>
                                  <input type="text" class='form-control' name="kabupaten" id="kabupaten" value='{{ $donasis->kabupaten}}' readonly>
                                </div>     

                                <div class='form-group'>
                                  <label for="provinsi">Provinsi</label>
                                  <input type="text" class='form-control' name="provinsi" id="provinsi" value='{{ $donasis->provinsi}}' readonly>
                                </div>     

                                <div class='form-group'>
                                  <label for="status">Status</label>
                                  <input type="text" class='form-control' name="status" id="status" value='{{ $donasis->status}}' readonly>
                                </div>     

                                <hr>

                                <h3 for="barang">Barang</h3>
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
                              </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    @endsection
       
