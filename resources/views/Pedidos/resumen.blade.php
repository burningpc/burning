@extends('layout')

@section('tittle')
    pedido 
@endsection

@section('content') 
    <div class="container">
        <div class="page-header">
            <h1>Pedidos registrados del vendedor </h1>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Elementos</th>
                <th scope="col">Total</th>
                <th scope="col">Rut cliente</th>
                <th scope="col">Fecha de compra</th>
                <th scope="col">Descripción</th>
                <th scope="col">Ensamblador</th>
                </tr>
            </thead>
            <tbody>
            @auth
                @forelse ($pedido as $pedidoItem)
                    @if(intval($pedidoItem->rut_vendedor) == Auth::user()->id)
                    
                        <tr>
                        <td>{{$pedidoItem->id}}</td>
                        <td>{{$pedidoItem->infoCarrito}}</td>
                        <td>{{$pedidoItem->total}}</td>
                        <td>{{$pedidoItem->rut_cliente}}</td>
                        <td>{{$pedidoItem->fecha_compra}}</td>
                        <td>{{$pedidoItem->descripcion}}</td>
                        <td>
                            {{$pedidoItem->rut_ensamblador}}
                        </td>
                        </tr>
                    @endif
                @endforeach
            @endauth       
            </tbody>
        </table>
    </div>           
@endsection 