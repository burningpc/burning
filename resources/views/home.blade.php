@extends('layout')

@section('tittle')
    Home
@endsection

@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="bannerb.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <p class="text-body">Entorno digital para tener registro de evaluaciones docentes.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="bannerA.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Ranking de evaluaciones</h5>
        <p>Sistema de posicionamiento de docentes mejor evaluados</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="banner.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Sistema de facil uso</h5>
        <p>Calificaciones de manera ordenada en conjunto con una interfaz intuitiva, producen un rapido acceso y evaluacionde  los datos</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

@endsection