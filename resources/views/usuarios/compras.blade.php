@extends('layout')

@section('tittle')
    Compras
@endsection

@section('content') 
    <div class="container">
        <div class="page-header">
            <h1>Compras realizadas </h1>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Id Compra</th>
                <th scope="col">Elementos</th>
                <th scope="col">Total</th>
                <th scope="col">Id  Vendedor</th>
                <th scope="col">Fecha de compra</th>
                <th scope="col">Descripción</th>
                <th scope="col">Id  Ensamblador</th>
                </tr>
            </thead>
            <tbody>
            @auth
                @forelse ($pedido as $pedidoItem)
                    @if(intval($pedidoItem->rut_cliente) == Auth::user()->dni)
                    
                        <tr>
                        <td>{{$pedidoItem->id}}</td>
                        <td>
                            {{$pedidoItem->infoCarrito}}
                        </td>
                        <td>{{$pedidoItem->total}}</td>
                        <td>{{$pedidoItem->rut_vendedor}}</td>
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