@extends('layout')

@section('tittle')
    Envios 
@endsection


@section('content')

<div class="container">
    @if(session('mensaje'))
        <div class="alert alert-succes shadow">
            {{session('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <a href="{{route('mostrar_pedidos')}}" class="btn btn btn-outline-dark btn-sm">Volver</a>
        </div>
    @endif
    <div class="bg-white py-4 px-4 shadow-lg rounded">
        <h1 class= 'text-danger'> Editar envio: </h1>

        <form action="{{route('envio_update', $envio->id)}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            
            @include('partials.validation-errors')
            
            Mi Rut: <input type = "text" name="rut_ensamblador" placeholder="Rut ensamblador" class="form-control mb-2" value="{{$envio->rut_ensamblador}}" readonly="readonly">
            Rut Cliente: <input type = "text" name="rut_cliente" placeholder="Rut cliente" class="form-control mb-2" value="{{$envio->rut_cliente}}" readonly="readonly">
            Id Compra: <input type = "text" name="id_compra" placeholder="Id compra" class="form-control mb-2" value="{{$envio->id_compra}}" readonly="readonly">
            Fecha entrega: <input type = "date" name="fecha_entrega" placeholder="Fecha a entregar" class="form-control mb-2" value="{{$envio->fecha_entrega}}">
            

            <button class="btn btn-warning btn-lg btn-block" type="submit">Editar producto</button>
            <a href="{{route('mostrar_pedidos')}}" class="btn btn btn-outline-dark btn-lg btn-block">Cancelar</a>
        </form>
    </div>
</div>





@endsection