@extends('layout2')

@section('content')
<h1 class="page-header">Evaluaciones del académico</h1>
    <table class="table table-hover table-striped">

            {{$academic[0]->rut}}<br>
            Nombre: {{ $academic[0]->nombre_1 }}
            {{ $academic[0]->apellido_1 }}<br>
            Título: {{ $academic[0]->titulo }}<br>
            Departemento: {{ $academic[0]->depto }}<br>
            Horas de contrato: {{ $academic[0]->hrs_contrato }}<br>
            Tipo de planta: {{ $academic[0]->planta }}<br>
            Estado: {{ $academic[0]->estado }}<br>
            Categoría: {{ $academic[0]->categoria }}<br>
            <br>

    <thead>
            <tr>
                <th>ID</th>
                <th>Evaluador 1</th>
                <th>Evaluador 2</th>
                <th>Calificación final</th>
            </tr>                            
        </thead>
        <tbody>
            @foreach($evaluaciones as $evaluacion)
                @if($academic[0]->rut === $evaluacion->rut_academico)
                    <tr>
                        <td>{{ $evaluacion->id }}</td>
                        <td>{{ $evaluacion->rut_evaluador1 }}</td>
                        <td>{{ $evaluacion->rut_evaluador2 }}</td>
                        <td class="text-right">{{ $evaluacion->calificacion_final }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <hr>
    <p>
        <a href="{{ route('evaluacionesp.pdf', $academic[0]->rut) }}" class="btn btn-sm btn-primary">
            Descargar Archivo PDF
        </a>
<<<<<<< HEAD
<<<<<<< HEAD
        <a href="javascript:window.history.back();" class="btn btn-sm btn-primary">
            Regresar
        </a>
=======
>>>>>>> 6d6c209... Se realizo la interfaz de producto
=======
>>>>>>> 6d6c209aea32bb5c4d4d93dab1a346837083e752
    </p>
@endsection