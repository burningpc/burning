@extends('layout')

@section('tittle')
    pedido 
@endsection

@section('content') 
    <div class="container">
        <div class="bg-white py-4 px-4 shadow-lg rounded">
        @if($userCliente->dni != Auth::user()->dni or $userCliente->lastname2 == 'Campo vacio')
            <div class="row">
                <div class="col text-center">
                    <p>Al parecer faltan algunos campos en su registro como cliente, por favor complete estos registro y vuelva a realizar el pago<p>
                    <a class="btn btn-danger" href="{{ route('ingresar' )}}">Editar mis datos</a>
                </div>
            </div>
        @else
        <form  method="POST" action="{{route('pedidos.store')}}"  >
                @csrf
                
                <div  style="width:1050px">
                    <img src="{{asset('CABEZA_BOLETA.png')}}" class="img-fluid " alt="Responsive image">
                </div>
            
                <h2 class="bg-secondary text-light" >
                    DATOS PERSONALES
                </h2>
                <div class="input-group">
                
                    <input type = "text" name="Nombre1" placeholder="Nombre" class="form-control mb-2" value="{{ $userCliente->name }}" readonly="readonly">
                    <input type = "text" name="Apellido1" placeholder="Obtener de tabla cliente" class="form-control mb-2" value="{{ $userCliente->lastname1 }}" readonly="readonly"> 
                    <input type = "text" name="Rut1" placeholder="Obtener de tabla cliente" class="form-control mb-2"value="{{ $userCliente->dni }}" readonly="readonly">
                    <input type = "text" name="Mail1" placeholder="Mail" class="form-control mb-2" value="{{ $userCliente->email }}" readonly="readonly">

                </div>

                <h2 class="bg-secondary text-light" >
                    DATOS DE ENVÍO
                </h2>
                <div class="input-group">
                    <input type = "text" name="Ciudad" placeholder="Ej: Springfield" class="form-control mb-2" value="{{ $userCliente->city }}" readonly="readonly">
                    <input type = "text" name="Comuna" placeholder="Ej: Springfield" class="form-control mb-2" value="{{ $userCliente->commune }}" readonly="readonly"> 
                    <input type = "text" name="Calle" placeholder="Ej: Av. Siempre viva" class="form-control mb-2" value="{{ $userCliente->addres }}" readonly="readonly">
                    <input type = "text" name="Número" placeholder="Ej: #123" class="form-control mb-2 " value="{{ $userCliente->number }}" readonly="readonly">
                </div>

                <h2 class="bg-secondary text-light" >
                    DATOS DE VENDEDOR
                </h2>
                <div class="input-group">
                    @php
                        $existe = 0;
                    @endphp
                    @forelse ($user as $userItem)
                        @if($userItem->typeuser == 'Encargado de ventas' && $userItem->estado == 'Inactivo') <!--Luego comprobar tambien por su disponibilidad-->
                            <input type = "text" name="Nombre2" placeholder="Nombre" class="form-control mb-2" value="{{ $userItem->name }}" readonly="readonly">
                            <input type = "number" name="ID2" placeholder="Id" class="form-control mb-2" value="{{ $userItem->id }}" readonly="readonly"> 
                            <input type = "text" name="Mail2" placeholder="Mail" class="form-control mb-2" value="{{ $userItem->email }}" readonly="readonly">
                            @php
                                $existe = 1;
                            @endphp
                            @break
                        @endif
                    @endforeach
                    @if($existe == 0)
                        <input type = "text" name="Nombre2" placeholder="Nombre" class="form-control mb-2" value="No existe vendedor disponible" readonly="readonly">
                        <input type = "text" name="ID2" placeholder="Id" class="form-control mb-2" value="No existe vendedor disponible" readonly="readonly"> 
                        <input type = "text" name="Mail2" placeholder="Mail" class="form-control mb-2" value="No existe vendedor disponible" readonly="readonly">
                    @endif
                </div>


                <h3 class="text-secondary" >
                        Observación
                    </h3>
                <div class="input-group">
                    <input type = "text" name="observacion" placeholder="Comentarios (opcional)" class="form-control mb-2" >
                </div>

                <h2 class="bg-secondary text-light" >
                    LISTA DE PRODUCTOS
                </h2>

                <table class="table table-bordered">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio Unitario</th>
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
                            <td><span class="badge badge-dark badge-pill">{{ $carritoItem->cantidad_producto }}</span></td>
                            <td>{{ $carritoItem->precio_producto }}</td>
                                @php
                                $auxPrecioTotal = $auxPrecioTotal + $carritoItem->precio_producto*$carritoItem->cantidad_producto;   
                                $auxCantidadTotal = $auxCantidadTotal + $carritoItem->cantidad_producto
                                @endphp
                        </tr>    
                        @empty
                        <tr>
                        </tr>
                        @endforelse
                    <tr class="table-dark">
                        <td>Total compra:</td> 
                        <td><span class="badge badge-dark badge-pill">{{ $auxCantidadTotal}}</span> </td>
                        <td>{{ $auxPrecioTotal}} </td>
                    </tr>

                    
                    </tbody>
                    </table>
                    <h2 class="bg-secondary text-light" >
                        METODO DE PAGO
                    </h2>
                    <div class="text-center">
                    <br> <input type="text" name="numcard" class="form-control" placeholder="Ingrese numero de la tarjeta" required> </br> 
                    </div>
                    <div class="input-group">
                    <br> <input type="text" name="mes" class="form-control" placeholder="Mes expiración" required></br> &nbsp;&nbsp;
                        <input type="text" name="ano" class="form-control" placeholder="Año expiración" required>&nbsp;&nbsp;
                        <input type="text" name="CCV" class="form-control" placeholder="CCV" required>&nbsp;&nbsp;&nbsp;&nbsp;
                        <div  style="width:50px">
                            <img src="{{asset('credit_card.png')}}" class="img-fluid" alt="Responsive image">
                        </div>
                    </div>


                <button class="btn btn btn-outline-dark btn-lg btn-block" type="submit">Pagar</button>
                <a href="javascript:history.back()" class="btn btn btn-outline-dark btn-lg btn-block">Cancelar</a>
            </form>
        </div>
    </div>
        @endif

            
@endsection 