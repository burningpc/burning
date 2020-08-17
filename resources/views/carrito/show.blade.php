@extends('layout')

@section('tittle')
    Carrito  
@endsection

@section('content')
 
<div class="container">

    <div class="d-flex justify-content-between align-items-center">
    <h1 class="display-4 mb-0">Carrito</h1>
    <div class="align-items-right">
        <a class="btn btn-primary" href="{{ route('carrito.show') }}">Si no aparece su producto agregado, Presioname!</a> 
        <a class="btn btn-primary" href="{{ route('mostrar_producto') }}">Seguir comprando</a> 
    </div>
    </div>
    <hr>
    <p class="lead text-secondary">Estado del pedido</p>

    <table class="table table-bordered">
        <thead class="bg-primary">
            <tr> 
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio unitario</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
    </tbody>
    @php
    $auxPrecioTotal = 0;
    $auxCantidadTotal = 0;
    @endphp
        @forelse ($carrito as $carritoItem) 
        <tr> 
            <td>{{ $carritoItem->nombre_producto }}</td> 
            <td align="center">
            <a href="{{route('carrito.borrar',$carritoItem)}}" class="btn btn-primary "><</a>
            <span class="btn btn-primary">{{ $carritoItem->cantidad_producto }}</span>
            <a href="{{route('carrito.agregar', $carritoItem)}}" class="btn btn-primary ">></a>
            
            </td>
            <td>{{ $carritoItem->precio_producto }}</td>
            <td align="center"><a class="btn btn-warning" href="{{route('mostrar_review', $carritoItem)}}">Ver Reviews</a></td>
                
                @php
                $auxPrecioTotal = $auxPrecioTotal + $carritoItem->precio_producto*$carritoItem->cantidad_producto;   
                $auxCantidadTotal = $auxCantidadTotal + $carritoItem->cantidad_producto
                @endphp

              
        </tr>  
        @empty
        <tr>
             
        </tr>
        @endforelse
    <tr class="table-primary"> 
        <td >Total compra:</td> 
        <td align="center"><span class="btn btn-primary">{{ $auxCantidadTotal}}</span> </td>
        <td>{{ $auxPrecioTotal}} </td>
        <td align="center"> 
        @auth
            @foreach ($carrito as $carritoItem)
            <a class="btn btn-danger" href="{{route('carrito.borrarTodo')}}">Quitar Todo</a>
            <a class="btn btn-primary" href="{{ route('pedidos.index') }}">Ir al pago</a> 
            @break
            @endforeach
        @endauth
        </td>
         
    </tr>
    </tbody>
    </table>
</div>
@endsection 