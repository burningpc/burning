@extends('layout')

@section('tittle')
    Pautas de evaluación
@endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="display-4 mb-0">Pautas de evaluación </h1>
        <a class="btn btn-warning" href="{{ route('academics.index') }}">Regresar a vista académicos</a>
    </div>
    <hr>

    <ul class="list-group">
        @forelse ($evaluaciones as $evaluacion)
            <!-- == string === int -->
            <li class="list-group-item border-0 mb-3 shadow-sm">
            <a class="text-secondary d-flex justify-content-between align-items-center" href="{{ route('evaluaciones.show', $evaluacion)}}">
            <span class="text-black-50">     
                ID: {{ $evaluacion->id }} <br> Rut evaluado: {{ $evaluacion->rut_academico}}
            </span> 
            </a>
            </li>
        
        @empty
            <li class="list-group-item border-0 mb-3 shadow-sm">
                No hay evaluaciones realizadas
            </li>
        @endforelse
        
            
    </ul>
    <div class="d-flex justify-content-between align-items-center">
        <a class="btn btn-warning" href="{{ route('evaluacion') }}">Ver resumen</a>
    </div>
</div>

@endsection
