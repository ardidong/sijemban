
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
                              <form method="post" action="{{ route('upload.store') }}" name="add_bencana" id="add_bencana" enctype="multipart/form-data">
                                @csrf
                                <div class='form-group'>
                                    <label for="Gambar"><b>Upload Gambar (max 2MB)</b></label>
                                    <input size='2' class='form-control input-lg' type="file" name="gambar" id="gambar" required>   
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
       
