@extends('layoutsumum')

@section('content')
      <!-- Main jumbotron for a primary marketing message or call to action -->
        <!-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="first-slide" src="/storage/gambar/1.jpg" alt="First slide">
              <div class="container">
                <div class="carousel-caption text-left">
                  <h1>Indonesia Bersama Palestina</h1>
                  <p>Mari bantu saudara kita di Palestina. Bantuan kalian sangat membantu mereka.</p>
                  <p><a class="btn btn-lg btn-danger" href="#" role="button">Donasi Sekarang</a></p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img class="second-slide" src="/storage/gambar/2.jpg" alt="Second slide">
              <div class="container">
                <div class="carousel-caption">
                  <h1>Peduli Perbatasan</h1>
                  <p>Yang jauh dari lampu kota, yang butuh bantuan kita. Peduli sesama, bantu saudara.</p>
                  <p><a class="btn btn-lg btn-danger" href="#" role="button">Donasi Sekarang</a></p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img class="third-slide" src="/storage/gambar/3.jpg" alt="Third slide">
              <div class="container">
                <div class="carousel-caption text-right">
                  <h1>Gotong Royong Hadapi Bencana.</h1>
                  <p>Bencana dimana-mana menyebabkan saudara kita menderita. Duka kehilangan anggota keluarga dan harta benda dirasakan mereka.</p>
                  <p>Jangan biarkan mereka bersedih. Ulurkan tangan kalian.</p>
                  <p><a class="btn btn-lg btn-danger" href="#" role="button">Donasi Sekarang</a></p>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div> -->
        <div class="jumbotron" style="background-image: url(homepage.jpg); background-size: cover; height:700px;">
          <div class="container">
            <h4 class="display-4" style="color: white; text-align:center; margin-top: 250px;">Donasikan Barang Anda Untuk Orang Yang Membutuhkan</h4>
          </div>
        </div>
        <div class="" style="height:120px; background-color: black; margin-top:-150px; opacity: 0.7;">

        </div>
        <!-- <img src="homepage.jpg" class="img-fluid" alt="Responsive image" style="margin-top:-90px;"> -->
        <div class="container" style="height: 100px; margin-top:-110px; color:#ffffff; font-size:20px;">
          <div class="row">
            <div class="col-sm">
              Jumlah Barang Diberikan
              <br>{{$total2}}</br>
            </div>
            <div class="col-sm">
              Jumlah Bencana Terjadi
              <br>{{$total}}</br>
            </div>
            <div class="col-sm">
              Banyak Orang Berdonasi
              <br>{{$total3}}</br>
            </div>
          </div>
        </div>
        <div class="container" style="margin-top:50px;">
          <h4 style="color:#565656; text-align: center;">CARA MEMBERIKAN DONASI</h4>
          <img src="cara.png" class="img-fluid" alt="Responsive image" style="margin-top:20px;">
        </div>
        <div class="album py-5">
            <div class="container shadow p-3 mb-5 bg-white rounded" style="background-color:white;">
              <div class="row">

                @foreach($bencanas as $bencana)
                @if($bencana->status=="Ditampilkan")
                <div class="col" style="margin-top: 20px;">
                  <div class="card" style="width: 18rem; margin-bottom:50px; text-align:left;">
                    <a href="#" class="deskirpsi-card" style="color: #196D7C;">
                      <img class="card-img-top" src="/storage/cover/{{$bencana->cover}}" alt="tidak ada gambar" style="height: 200px">
                      <div class="card-body">
                        <div style="height:45px; overflow: hidden;">
                          <h5 class="card-title">{{$bencana->nama_bencana}}</h5>
                        </div>
                        <div  style="height:90px; width:250px; overflow: hidden;">
                            <p class="card-text">{{$bencana->deskripsi}}</p>
                        </div>
                      </div>
                    </a>
                    <div class="card-body" style="height: 50px !important;">
                    <a href="#" class="card-link">
                      {{$bencana->batas_waktu->diffForHumans()}}
                    </a>
                  </div>
                  </div>
                </div>
                <!-- <div class="col-md-4">
                  <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="" alt="Card image cap">
                    <div class="card-body">
                      <p class="card-text"></p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        <a href="donasi/create/{{$bencana->id }} " class="btn btn-danger btn active" role="button" aria-pressed="true">Donasi</a>
                        </div>
                        <div data-countdown="{{$bencana->batas_waktu}}"></div>
                      </div>
                    </div>
                  </div>
                </div> -->
                @endif
                @endforeach
              </div>
            </div>
          </div>
@endsection

  @section('script')
    <script src="/bower_components/jquery.countdown/dist/jquery.countdown.js"></script>
    <script>


      $('[data-countdown]').each(function() {
        var $this = $(this), finalDate = $(this).data('countdown');
          $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('%D days'));
          });
      });

    </script>
  @endsection
