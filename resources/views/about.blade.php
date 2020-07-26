@extends('layout')

@section('tittle')
    about
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img src="{{asset('about_image.jpg')}}" class="img-fluid" alt="Responsive image">
            <div class="img-fluid mb-4" src="/img/about.SVG" alt="Quienes somos"></div>
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-4 text-primary">Quienes somos</h1>
            <p class="lead text-secondary">Somos un grupo de trabajo nuevo con una limitada trayectoria en el desarrollo web, pero no así nuestro entusiasmo por aprender y aportar al desarrollo humano y tecnológico, como esta herramienta, que facilita el acceso a información muy solicitada lo que significa un ahorro de tiempo y dinero.</p>

            
        </div>
    </div>
</div>

@endsection