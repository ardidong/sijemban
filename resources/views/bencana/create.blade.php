
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class='row mt-5'>
            <div class='col-md-8 offset-md-2'>
                <div class='card shadow mb-5 bg-white rounded'>
                    <div class='card-header bg-danger text-white'><h2>Input Bencana</h2></div>
                    <div class='card-body'>
                        <div class='row'>
                            <div class='col-md-12'>
                              <form method="post" action="{{ route('bencana.store') }}" name="add_bencana" id="add_bencana" enctype="multipart/form-data">
                                @csrf

                                <div class='form-group'>
                                    <label for="nama bencana"><b>Nama Bencana</b></label>
                                    <input class='form-control' type="text" placeholder="masukkan nama bencana" name="nama_bencana" required>
                                </div>

                                <div class='form-group'>
                                    <label for="deskripsi bencana"><b>Deskripsi Bencana</b></label>
                                    <textarea class='form-control' name="deskripsi" rows="7" col="15" placeholder="masukkan deskripsi bencana" required></textarea>
                                </div>

                                <div class='form-group'>
                                    <label for="Gambar"><b>Cover Bencana (max 2MB)</b></label>
                                    <input class='form-control' type="file" name="cover" id="cover" required>   
                                </div>

                                <div class='form-group'>
                                    <label for="batas waktu"> <b>Batas Waktu</b></label>
                                    <input type="date" class='form-control' name='batas_waktu' >
                                </div>
                                
                                
                                <input type="submit" class="btn btn-primary" value="Submit" >
                              </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   
    @endsection
       
