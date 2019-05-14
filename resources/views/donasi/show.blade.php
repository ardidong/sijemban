
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
                                  <textarea  class='form-control' name="" id="" cols="30" rows="3">{{ $donasis->alamat }}</textarea>
                                </div>    

                                <div id='map-canvas'>

                                </div>

                                <div class='form-group'>
                                  <label for="status">Status :</label>
                                  <label type="text" class='form-control' name="status" id="status" value='' >{{ $donasis->status}}</label>
                                </div>    

                                <div class='form-group'>
                                  <label for="Diajukan Pada">Diajukan Pada :</label>
                                  <label type="text" class='form-control' name="diajukan" id="diajukan" value='' >{{ $donasis->created_at}}</label>
                                </div>    

                                <div class='form-group'>
                                  <label for="Dijemput Pada">Dijemput Pada :</label>
                                  <label type="text" class='form-control' name="dijemput" id="dijemput" value='' >{{ $donasis->tanggal_jemput}}</label>
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
        <style>
            #map-canvas {
                width: 100%;
                height: 250px;
            }
        </style>
        <script >
          var map;
function initMap(){
  var donasi = {!! json_encode($donasis->toArray()) !!};
  var myLatlng = new google.maps.LatLng(donasi.latitude, donasi.longitude);




  map = new google.maps.Map(document.getElementById('map-canvas'), {
      center: myLatlng,
      zoom: 13
    });

    var marker = new google.maps.Marker({
			    position: myLatlng,
			    map: map,
			});
          
  }  



    
          
        </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6vGzt-YmKpCg-WwAL-FJ7VQ1N9QZzM3U&callback=initMap">
        </script>
    @endsection
    
    
