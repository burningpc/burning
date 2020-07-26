@extends('layout')

@section('tittle')
    Editar evaluación
@endsection

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-24 col-sm-20 col-lg-12 mx-auto">
            @include('partials.validation-errors')
            <form class="bg-white py-3 px-4 shadow rounded" 
            method="POST" action="{{ route('evaluaciones.update', $evaluacion, $evaluacion) }}">
                @method('PATCH')
                <h1 class="display-4">Editar evaluación</h1><hr>
                @csrf
                <div class="form-group row form-group-sm">
                <div class="col-md-4">
                    <label for="title">Rut académico a evaluar</label>
                        <input class="form-control border-0 bg-light shadow-sm" readonly="readonly"
                            type="text" name="rut_academico" value="{{ old('rut_academico', $evaluacion->rut_academico) }}">       
                </div>
                <div class="col-md-4">
                    <label for="title">Calificación obtenida en evaluación anterior</label>
                        <input class="form-control border-0 bg-light shadow-sm" readonly="readonly"
                            type="text" name="calificacion_anterior" value="{{ old('calificacion_anterior', $evaluacion->calificacion_anterior) }}">       
                </div>
                <div class="col-md-4">
                    <label for="title">Observación obtenida en evaluación anterior</label>
                        <input class="form-control border-0 bg-light shadow-sm" readonly="readonly"
                            type="text" name="observacion_anterior" value="{{ old('observacion_anterior', $evaluacion->observacion_anterior) }}">       
                </div>
                </div>
                @include('evaluaciones._form', ['btnText' => 'Actualizar'])
            </form>
        </div>
    </div>
</div>
@endsection