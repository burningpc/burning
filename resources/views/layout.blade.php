<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.navbar-custom {
    background-color: #ff5500;
}
/* change the brand and text color */
.navbar-custom .navbar-brand,
.navbar-custom .navbar-text {
    color: rgba(255,255,255,.8);
}
/* change the link color */
.navbar-custom .navbar-nav .nav-link {
    color: rgba(255,255,255,.5);
}
/* change the color of active or hovered links */
.navbar-custom .nav-item.active .nav-link,
.navbar-custom .nav-item:hover .nav-link {
    color: #ffffff;
}
.fa {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}

</style>
<head>
    <title>@yield('tittle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
</head>
<body>
    <div id="app" class="d-flex flex-column h-screen justify-content-between">
    <header>
        @include('partials.nav')
        @include('partials.session-status')
        
    </header>

    <main class="py-4">
        @yield('content')
        
    </main>

    

    <footer class="bg-with text-center text-black-50 py-3 shadow">
        <!-- Add font awesome icons -->



<!-- Footer -->
<footer class="page-footer font-small unique-color-dark">

  
  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">
    <!-- Grid row -->
    <div class="row mt-3">
      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
        <a class="navbar-brand" href="{{ route('home') }}">
          <div  style="width:200px">
            <img src="{{asset('logo.png')}}" class="img-fluid" alt="Responsive image">
          </div>
        </a>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Quienes somos</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Somos un grupo de trabajo nuevo con una limitada trayectoria en el desarrollo web, pero no así nuestro entusiasmo por aprender y aportar al desarrollo humano y tecnológico, como esta herramienta, que facilita el acceso a información muy solicitada lo que significa un ahorro de tiempo y dinero.</p>
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contacto</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i> Talca, Chile</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> Contacto@PcBurning.cl</p>
        <p>
          <i class="fas fa-phone mr-3"></i> + 569 93456788</p>
        <p>
          <i class="fas fa-phone mr-3"></i> + 569 23456789</p>
      </div>
      <!-- Grid column -->
    </div>
    <!-- Grid row -->
  </div>
  <!-- Footer Links -->
  
      <div class="navbar-custom">
        <div class="container navbar-custom">
          <!-- Grid row-->
          <div class="row py-4 d-flex align-items-center">
            <!-- Grid column -->
            <div class="col-md-6 col-lg-10 text-center text-md-left mb-4 mb-md-0">
              <h6 class="mb-0 text-light">Conectate con nosotros en nuestras redes sociales!</h6>
            </div>
            <!-- Grid column -->
            <a href="https://www.facebook.com/ucatolicadelmaule/" class="fab fa-facebook  btn-sm "   alt="Cinque Terre"></a>
            <a href="https://twitter.com/ucatolicamaule" class="fab fa-twitter btn-sm" alt="Cinque Terre"></a>
            <a href="https://www.linkedin.com/edu/universidad-cat%C3%B3lica-del-maule-10952" class="fab fa-linkedin btn-sm"   alt="Cinque Terre"></a>
            <a href="https://www.youtube.com/channel/UCI6mMQ5izHQa9MvWUAUV_Eg" class="fab fa-youtube btn-sm"   alt="Cinque Terre"></a>
            <a href="https://www.instagram.com/ucatolicamaule/" class="fab fa-instagram btn-sm"   alt="Cinque Terre"></a>
            <!-- Grid column -->
          </div>
          <!-- Grid row-->
        </div>
      </div>
      
      {{ config('app.name') }} | Copyright @ {{ date('Y') }}    
    </footer>
</body>
</html>
            