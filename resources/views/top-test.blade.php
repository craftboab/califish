<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>CaliforniaFish</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/top.css') }}" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-sm fixed-top">
    <div class="container">
      <a href="index.html" class="navbar-brand">California Fish</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a href="#home" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#about" class="nav-link">About Us</a>
          </li>
          <li class="nav-item">
            <a href="#gallery" class="nav-link">Gallery</a>
          </li>
          <li class="nav-item">
            <a href="#newsletter" class="nav-link">Blog</a>
          </li>
        </ul>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
            @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
            @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/items">
                      Shopping
                  </a>
                  <a class="dropdown-item" href="/users/{{ Auth::user()->id }}">
                      Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </li>
              <li class="nav-item">
                  <a href="/cartitem" class="nav-link">cart</a>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- SHOWCASE SLIDER -->
  <section id="showcase">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item carousel-image-1 active">
          <div class="container">
            <div class="carousel-caption d-none d-sm-block text-right mb-5">
              <h1 class="display-3">Serving to you as fresh</h1>
              <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, aperiam vel ullam deleniti reiciendis ratione
                quod aliquid inventore vero perspiciatis.</p>
              <!-- <a href="#" class="btn btn-danger btn-lg">Sign Up Now</a> -->
            </div>
          </div>
        </div>

        <div class="carousel-item carousel-image-2">
          <div class="container">
            <div class="carousel-caption d-none d-sm-block mb-5">
              <h1 class="display-3">Various Items</h1>
              <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, aperiam vel ullam deleniti reiciendis ratione
                quod aliquid inventore vero perspiciatis.</p>
              <a href="#" class="btn btn-primary btn-lg">Learn More</a>
            </div>
          </div>
        </div>

        <div class="carousel-item carousel-image-3">
          <div class="container">
            <div class="carousel-caption d-none d-sm-block text-right mb-5">
              <h1 class="display-3">sustainability</h1>
              <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, aperiam vel ullam deleniti reiciendis ratione
                quod aliquid inventore vero perspiciatis.</p>
              <a href="#" class="btn btn-success btn-lg">Learn More</a>
            </div>
          </div>
        </div>
      </div>

      <a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
        <span class="carousel-control-prev-icon"></span>
      </a>

      <a href="#myCarousel" data-slide="next" class="carousel-control-next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </section>

  <!--HOME ICON SECTION  -->
  <section id="home-icons" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4 text-center">
          <i class="fas fa-cog fa-3x mb-2"></i>
          <h3>岡田の</h3>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, veniam.</p>
        </div>
        <div class="col-md-4 mb-4 text-center">
          <i class="fas fa-cloud fa-3x mb-2"></i>
          <h3>岡田による</h3>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, veniam.</p>
        </div>
        <div class="col-md-4 mb-4 text-center">
          <i class="fas fa-cart-plus fa-3x mb-2"></i>
          <h3>岡田為の</h3>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, veniam.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- HOME HEADING SECTION -->
  <section id="home-heading" class="p-5">
    <div class="dark-overlay">
      <div class="row">
        <div class="col">
          <div class="container pt-5">
            <h1>What We Do</h1>
            <p class="d-none d-md-block">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est eaque magni sit dolores. Nisi, dolor nam modi perspiciatis
              consequatur soluta.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PHOTO GALLERY -->
  <section id="gallery" class="py-5">
    <div class="container">
      <h1 class="text-center">Photo Gallery</h1>
      <p class="text-center">Check out our photos</p>
      <div class="row mb-4">
        <div class="col-md-4">
          <a href="" data-toggle="lightbox" data-gallery="img-gallery" data-height="560"
            data-width="560">
            <img src="{{ asset('/images/fish/brandi-ibrao-0myHruKyNWQ-unsplash.jpg') }}" alt="" class="img-fluid" style="height:20rem; width:30rem">
          </a>
        </div>
        <div class="col-md-4">
          <a href="" data-toggle="lightbox" data-gallery="img-gallery" data-height="560"
            data-width="560">
            <img src="{{ asset('/images/fish/jakub-kapusnak-vLQzopDRSNI-unsplash.jpg') }}" alt="" class="img-fluid" style="height:20rem; width:30rem">
          </a>
        </div>
        <div class="col-md-4">
          <a href="" data-toggle="lightbox" data-gallery="img-gallery" data-height="560"
            data-width="560">
            <img src="{{ asset('/images/fish/chuttersnap-bmJIOogVW-w-unsplash.jpg') }}" alt="" class="img-fluid" style="height:20rem; width:30rem">
          </a>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-4">
          <a href="" data-toggle="lightbox" data-gallery="img-gallery" data-height="560"
            data-width="560">
            <img src="{{ asset('/images/fish/dan-mall-YBVWJon2vAU-unsplash.jpg') }}" alt="" class="img-fluid" style="height:20rem; width:30rem">
          </a>
        </div>
        <div class="col-md-4">
          <a href="" data-toggle="lightbox" data-gallery="img-gallery" data-height="560"
            data-width="560">
            <img src="{{ asset('/images/fish/gregor-moser-QGIJUqnEpCY-unsplash.jpg') }}" alt="" class="img-fluid" style="height:20rem; width:30rem">
          </a>
        </div>
        <div class="col-md-4">
          <a href="" data-toggle="lightbox" data-gallery="img-gallery" data-height="560"
            data-width="560">
            <img src="{{ asset('/images/fish/rio-lecatompessy-11Az4cEgMMU-unsplash.jpg') }}" alt="" class="img-fluid" style="height:20rem; width:30rem">
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- NEWSLETTER -->
  <section id="newsletter" class="text-center p-5 bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>Sign Up For Our Newsletter</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio asperiores consectetur, quae ducimus voluptates
            vero repellendus architecto maiores recusandae mollitia?</p>
          <form class="form-inline justify-content-center">
            <input type="text" class="form-control mb-2 mr-2" placeholder="Enter Name">
            <input type="text" class="form-control mb-2 mr-2" placeholder="Enter Email">
            <button class="btn btn-primary mb-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer id="main-footer" class="text-center p-4">
    <div class="container">
      <div class="row">
        <div class="col">
          <p>Copyright &copy;
            <span id="year"></span> Glozzom</p>
        </div>
      </div>
    </div>
  </footer>


  <!-- VIDEO MODAL -->
  <div class="modal fade" id="videoModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
          <iframe src="" frameborder="0" height="350" width="100%" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>



  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());

    // Configure Slider
    $('.carousel').carousel({
      interval: 6000,
      pause: 'hover'
    });

    // Lightbox Init
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
      event.preventDefault();
      $(this).ekkoLightbox();
    });

    // Video Play
    $(function () {
      // Auto play modal video
      $(".video").click(function () {
        var theModal = $(this).data("target"),
          videoSRC = $(this).attr("data-video"),
          videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
        $(theModal + ' iframe').attr('src', videoSRCauto);
        $(theModal + ' button.close').click(function () {
          $(theModal + ' iframe').attr('src', videoSRC);
        });
      });
    });

  </script>
</body>

</html>
