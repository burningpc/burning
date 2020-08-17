@extends('layout')

@section('tittle')
    pedido 
@endsection

@section('content') 
    <div class="container">
        <div class="page-header">
            <h1>Pedidos sin ensamblador asignado</h1>
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
                <th scope="col">Asignar ensamblador</th>
                </tr>
            </thead>
            <tbody>
            @auth
                @forelse ($pedido as $pedidoItem)
                    @if(intval($pedidoItem->rut_vendedor) == Auth::user()->id and $pedidoItem->rut_ensamblador == 'por definir')
                    
                        <tr>
                        <td>{{$pedidoItem->id}}</td>
                        <td>
                            {{$pedidoItem->infoCarrito}}
                        </td>
                        <td>{{$pedidoItem->total}}</td>
                        <td>{{$pedidoItem->rut_cliente}}</td>
                        <td>{{$pedidoItem->fecha_compra}}</td>
                        <td>{{$pedidoItem->descripcion}}</td>
                        <td>
                        <form action="{{route('pedidos.update', $pedidoItem->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <div class="input-group mb-3">
                            <select id="Rut3" type="text" class="form-control " name="Rut3" required="">
                                @forelse ($user as $userItem)
                                    @if ($userItem->typeuser == 'Ensamblador')
                                        <option value ="{{$userItem->id}}">{{$userItem->name}} {{$userItem->lastname}}</option>
                                    @endif
                                @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-primary  btn-block" type="submit">Asignar Ensamblador</button>
                                </div>
                            </div>
                        </form>
                        </td>
                        </tr>
                    @endif
                @endforeach
            @endauth       
            </tbody>
        </table>
    </div>           
@endsection 