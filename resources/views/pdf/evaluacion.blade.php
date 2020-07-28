@extends('layout2')

@section('content')
<div class="container">
    <br>

    <img src="{{asset('logo-png.png')}}" style="width:200px">
    
    <br>
    <br>

    <?php
        $media = 0;
        $rango = 0;
        $contador = 0;
        $suma = 0;
        $maximo = 0;
        $minimo = INF;
    ?>

    <h1 class="page-header">Listado de evaluaciones</h1>
    <table class="table table-hover table-striped">
    <thead>
            <tr>
                <th>ID</th>
                <th>Rut academico</th>
                <th>Evaluador 1</th>
                <th>Evaluador 2</th>
                <th>Calificación final</th>
            </tr>                            
        </thead>
        <tbody>
            @foreach($evaluaciones as $evaluacion)
            <?php
                $contador = $contador + 1;
                $suma = $suma + $evaluacion->calificacion_final;
                if($evaluacion->calificacion_final < $minimo){
                    $minimo = $evaluacion->calificacion_final;
                }
                if($evaluacion->calificacion_final > $maximo){
                    $maximo = $evaluacion->calificacion_final;
                }
            ?>
            <tr>
                <td>{{ $evaluacion->id }}</td>
                <td>{{ $evaluacion->rut_academico }}</td>
                <td>{{ $evaluacion->rut_evaluador1 }}</td>
                <td>{{ $evaluacion->rut_evaluador2 }}</td>
                <td class="text-right">{{ $evaluacion->calificacion_final }}</td>
            </tr>
            @endforeach
            <?php
                $media = $suma / $contador;
                $rango =  $maximo-$minimo;
            ?>
        </tbody>
    </table>

    <br>
    <br>
    <br>
    <br>

        Minimo: {{$minimo}}<br>
        Maximo: {{$maximo}}<br>
        Media: {{$media}}<br>
        Rango: {{$rango}}<br>
        Total: {{$contador}} Evaluacion(es)


</div>
    
@endsection