@extends('layout')

@section('tittle')
    Ranking
@endsection

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center">
    <h1 class="display-4 mb-0">Ranking</h1>
    <a class="btn btn-warning" href="{{ route('academics.index') }}">Regresar a vista académicos</a>
    </div>
    <hr>
    <?php
        $iter = 0; 
    ?>
        
    <p class="lead text-secondary text-black-50">Ranking General de todos los Académicos</p>
    <ul class="list-group">
        @foreach ($academics as $academic)
        <?php
            $iter = 1 + $iter;
        ?>
        
          <!-- == string === int -->
        <li class="list-group-item border-0 mb-9 shadow-sm">
<<<<<<< HEAD
<<<<<<< HEAD
            <span class="font-weight-bold text-secondary">
=======
=======
>>>>>>> 6d6c209aea32bb5c4d4d93dab1a346837083e752
            <span class="font-weight-bold">
>>>>>>> 6d6c209... Se realizo la interfaz de producto
                @if($iter === 1)
                    Rut: {{ $academic->rut }} || Nombre: {{$academic->nombre_1}} {{$academic->apellido_1}} || Departamento: {{$academic->depto}} || Nota: {{ $academic->promedio }} 
                       <img src="{{asset('primero.png')}}" style="float:left; margin:10px;" alt="Responsive image"><br>      
                @elseif($iter === 2)
                    Rut: {{ $academic->rut }} || Nombre: {{$academic->nombre_1}} {{$academic->apellido_1}} || Departamento: {{$academic->depto}} || Nota: {{ $academic->promedio }} 
                       <img src="{{asset('segun2.png')}}" style="float:left; margin:20px;" alt="Responsive image"><br>
                @elseif($iter === 3)
                    Rut: {{ $academic->rut }} || Nombre: {{$academic->nombre_1}} {{$academic->apellido_1}} || Departamento: {{$academic->depto}} || Nota: {{ $academic->promedio }} 
                       <img src="{{asset('tercero.png')}}" style="float:left; margin:30px;" alt="Responsive image"><br>
                @else
                                 {{$iter}}                      Rut: {{ $academic->rut }} || Nombre: {{$academic->nombre_1}} {{$academic->apellido_1}} || Departamento: {{$academic->depto}} || Nota: {{ $academic->promedio }} 
                @endif 
            </span> 
        </a>
        </li>
        @endforeach
            
    </ul>
    
</div>
<hr>
<div class="container">
    <div class="bg-white p-5 shadow rounded">
        <h4 align="center">Gráfico promedios</h4>    
        {{ $chart_bar->container() }}
        <script src="/js/Chart.min.js" charset="utf-8"></script>
        {{ $chart_bar->script() }}
        <p class="text-secondary" align="center">Ruts académicos</p>
    </div>
</div>
    
<hr>
<div class="container">
    <div class="bg-white p-5 shadow rounded">
    <h4 align="center">Gráfico promedios</h4>    
        {{ $chart_pie->container() }}
        <script src="/js/Chart.min.js" charset="utf-8"></script>
        {{ $chart_pie->script() }}
    </div>
</div>

@endsection