@extends('layout')

@section('tittle', 'Académicos | ' .$academic->rut) <!-- $academic = elemento de tabla BD academics -->
    
@section('content')

<div class="container">
    <div class="bg-white p-5 shadow rounded">
        <div class="d-flex justify-content-between align-items-center">
<<<<<<< HEAD
            <h1> {{ $academic->nombre_1 }} {{ $academic->apellido_1 }} </h1>  
=======
            <h1> {{ $academic-> rut}} </h1>  
<<<<<<< HEAD
>>>>>>> 6d6c209... Se realizo la interfaz de producto
=======
>>>>>>> 6d6c209aea32bb5c4d4d93dab1a346837083e752
            <form method="POST" action="{{ route('evaluaciones.promedio') }}" class="was-validated">
                @csrf @method('PATCH')
                <button type="submit" class="btn btn-warning">Ver ranking</button>
            </form>
        </div>
        <p class="text-secondary"> 
            Rut: {{ $academic-> rut}}<br>
            Título: {{ $academic->titulo }}<br>
            Departemento: {{ $academic->depto }}<br>
            Horas de contrato: {{ $academic->hrs_contrato }}<br>
            Tipo de planta: {{ $academic->planta }}<br>
            Estado: {{ $academic->estado }}<br>
            Categoría: {{ $academic->categoria }}<br>
  
        </p>
        <p class="text-black-50"> {{ $academic->created_at->diffForHumans() }} </p>
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('academics.index') }}">Regresar</a>
            @auth
            @if(Auth::user()->typeuser=='Administrador' or Auth::user()->typeuser=='Secretaria')
                <div class="btn-group btn-group-sm">
                    <a class="btn btn-primary" href="{{ route('academics.edit', $academic) }}">Editar</a>
                    <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-academic').
                    submit()">Eliminar</a>
                </div>
                    <form id="delete-academic" 
                    class="d-none"
                    method="POST" action="{{ route('academics.destroy', $academic) }}">
                        @csrf @method('DELETE')
                    </form>
            @endif
            @endauth
        </div>
    </div>
    <hr>
</div>


<div class="container">
    <div class="bg-white p-5 shadow rounded">
        <div class="btn-group btn-group-sm">
            <a class="btn btn-warning" data-toggle="collapse" href="#Evaluaciones" role="button" aria-expanded="false" aria-controls="collapseExample">Evaluaciones anteriores</a> 
            <a class="btn btn-warning" href="{{ route('evaluaciones.createEvaluation', $academic) }}">Evaluar académico</a>
            <a class="btn btn-warning" href="{{ route('academics.export', $academic->rut) }}">Exportar Pauta Resumen a Excel</a>
            <a class="btn btn-warning" href="{{ route('evaluacionp', $academic->rut) }}">Exportar Pauta Resumen a PDF</a>
        </div>
       
        <div class="collapse" id="Evaluaciones">
                <br>
                @forelse($concatenated as $dato)
                    @if($concatenated->count())
                        <a class="d-flex justify-content-between align-items-center" href="{{ route('evaluaciones.show', $dato)}}">
                        <table class="table table-condensed"> 
                        <tbody>
                        <tr class="info">    
                            <td>ID: {{ $dato->id }}</td>
                            <td>Calificacion: {{ $dato->calificacion_final}}</td>
                            <td>Fecha de evaluación: {{ $dato->created_at->format('d/m/Y')}}<td> 
                            <td>Fecha de edición: {{ $dato->updated_at->format('d/m/Y')}}<td> 
                        </tr>
                        </tbody>
                        </table>  
                        </a>
                    @else
                        No tiene evaluaciones anteriores
                    @endif
                @endforeach

                <hr>
            <div class="container ">
                <h4 align="center">Gráfico evaluaciones</h4>    
                {{ $chart->container() }}
                <script src="/js/Chart.min.js" charset="utf-8"></script>
                {{ $chart->script() }}
<<<<<<< HEAD
<<<<<<< HEAD
=======
                <p class="text-secondary" align="center"> ID Pauta </p>
>>>>>>> 6d6c209... Se realizo la interfaz de producto
=======
                <p class="text-secondary" align="center"> ID Pauta </p>
>>>>>>> 6d6c209aea32bb5c4d4d93dab1a346837083e752
            </div>
            </div>
            

        
    </div>
</div>
                 
@endsection