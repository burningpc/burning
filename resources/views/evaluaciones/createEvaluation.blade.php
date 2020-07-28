@extends('layout')

@section('tittle')
    Ingresar pautas  
@endsection

@section('content') 

<div class="container">
    <div class="row"> 
        <div class="col-24 col-sm-20 col-lg-12 mx-auto">
            @include('partials.validation-errors')
            <form class="bg-white py-3 px-4 shadow rounded" 
                method="POST" 
                action="{{ route('evaluaciones.store') }}">
                <h1 class="display-4">Nueva evaluación</h1>
                <hr>
                @csrf
                <div class="form-group row form-group-sm">
                <div class="col-md-4">
                    <label for="title">Rut académico a evaluar</label>
                        <input class="form-control border-0 bg-light shadow-sm" readonly="readonly"
                            type="text" name="rut_academico" value="{{ $academic->rut }}">       
                </div>
                <div class="col-md-4">
                    <label for="title">Calificación obtenida en evaluación anterior</label>
                        <input class="form-control border-0 bg-light shadow-sm" readonly="readonly"
                            type="text" name="calificacion_anterior" value="{{ $reverse[$i]->calificacion_final }}">       
                
                </div>
                <div class="col-md-4">
                    <label for="title">Observación obtenida en evaluación anterior</label>
                        <input class="form-control border-0 bg-light shadow-sm" readonly="readonly"
                            type="text" name="observacion_anterior" value="{{ $reverse[$i]->observacion_final }}">       
                
                </div>
                </div>
                @include('evaluaciones._form', ['btnText' => 'Guardar'])
            </form>
        </div>
    </div> 
</div>
@endsection