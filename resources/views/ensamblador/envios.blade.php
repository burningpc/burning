@extends('layout')

@section('tittle')
    Envios 
@endsection


@section('content')

<div class="container">
    <h1 class="text-danger">Pedidos</h1>
    <table class="table table-bordered">
        <thead class="bg-primary">
            <tr>
                <th scope="col">Pedido</th>
                <th scope="col">Rut cliente</th>
                <th scope="col">Fecha de compra</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Fecha envío</th>
                <th scope="col">----</th>
            </tr>
        </thead>
    </tbody>
    @isset($pedidos)
        @foreach ($pedidos as $item)
        @if (Auth::user()->id == $item->rut_ensamblador) 
        <tr>
            <td>{{ $item->id }}</td> 
            <td>{{ $item->rut_cliente }}</td>
            <td>{{ $item->fecha_compra }}</td>
            <td>{{ $item->descripcion }}</td>
            <td>{{ $item->total }}</td>
            <td>#</td>
            <td>
                <a href="{{route('ingresar_envio', $item)}}" class="btn btn-primary ">Definir envio</a>
                <a href="{{route('editar_envio', $item)}}" class="btn btn-warning ">Editar envio</a>
                <a href="#" class="btn btn-success ">Confirmar envio</a>
                {{--<form action="{{route('eliminar_envio', $item->id)}}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar envio?') ">Eliminar envio</button>
                </form>--}}
            </td>

        </tr>
        @endif
        @endforeach
    @endisset
    </tbody>
    </table>
</div>
   




@endsection

