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

    <h1 class="page-header">Evaluaciones del académico</h1>

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

    <table class="table table-hover table-striped">
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
                        <td>{{ $evaluacion->rut_evaluador1 }}</td>
                        <td>{{ $evaluacion->rut_evaluador2 }}</td>
                        <td class="text-right">{{ $evaluacion->calificacion_final }}</td>
                    </tr>
                @endif
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