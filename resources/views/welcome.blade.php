<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Sistem Jemput Bantuan</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-white fixed-top" style="background-color: #EB413D;">
      <a class="navbar-brand" href="{{route('home')}}" style="color: white; font-weight: bold;">JEMBATAN</a>    
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
         <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html" style="color: white">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="donasi.html" style="color: white">Donasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: white" href="#">Aktivitas Kami</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  style="color: white" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tentang</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Sejarah</a>
              <a class="dropdown-item" href="#">Visi Misi</a>
              <a class="dropdown-item" href="#">Manajemen</a>
              <a class="dropdown-item" href="#">Program Kami</a>
              <a class="dropdown-item" href="#">Kontak</a>
            </div>
          </li>
        </ul>
        
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">

          <!--Search Links-->
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn" type="button" style="background-color:white; color:#EB413D;">Search</button>
          </form>

          <!-- Authentication Links -->
          @guest
              <li class="nav-item ">
                  <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              <li class="nav-item">
                  @if (Route::has('register'))
                      <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                  @endif
              </li>
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item " href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
      </ul>

        
      </div>
    </nav>

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="first-slide" src="{{ asset('Storage/1.jpg')	}}" alt="First slide">
              <div class="container">
                <div class="carousel-caption text-left">
                  <h1>Indonesia Bersama Palestina</h1>
                  <p>Mari bantu saudara kita di Palestina. Bantuan kalian sangat membantu mereka.</p>
                  <p><a class="btn btn-lg btn-danger" href="#" role="button">Donasi Sekarang</a></p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img class="second-slide" src="{{ asset('Storage/2.jpg')	}}" alt="Second slide">
              <div class="container">
                <div class="carousel-caption">
                  <h1>Peduli Perbatasan</h1>
                  <p>Yang jauh dari lampu kota, yang butuh bantuan kita. Peduli sesama, bantu saudara.</p>
                  <p><a class="btn btn-lg btn-danger" href="#" role="button">Donasi Sekarang</a></p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img class="third-slide" src="{{ asset('Storage/3.jpg')	}}" alt="Third slide">
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
        </div>
        
        <div class="album py-5 bg-light">
            <div class="container">
              <div class="row">
              
                @foreach($bencanas as $bencana)
                <div class="col-md-4">
                  <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="/storage/cover/{{$bencana->cover}}" alt="Card image cap">
                    <div class="card-body">
                      <p class="card-text">{{$bencana->nama_bencana}}</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        <a href="donasi/create/{{$bencana->id }} " class="btn btn-danger btn active" role="button" aria-pressed="true">Donasi</a>
                        </div>
                        <small class="text-muted">9 mins</small>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach

               

                
    
              

               

                             
              </div>
            </div>
          </div>
    

    </main>

    <footer class="container">
      <p>&copy; R00T TEAM 2018</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="Public/bootsrap-4.1.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="Public/bootsrap-4.1.3/assets/js/vendor/popper.min.js"></script>
    <script src="Public/bootsrap-4.1.3/dist/js/bootstrap.min.js"></script>
  </body>
</html>
