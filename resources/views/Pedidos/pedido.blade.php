@extends('layout')

@section('tittle')
    pedido 
@endsection

@section('content')
    <div class="container">
        <div class="bg-white py-4 px-4 shadow-lg rounded">
            <form  method="POST" action="{{route('pedidos.store')}}"  >

                <div  style="width:1050px">
                    <img src="{{asset('CABEZA_BOLETA.png')}}" class="img-fluid " alt="Responsive image">
                </div>
            
                <h2 class="bg-secondary text-light" >
                    DATOS PERSONALES
                </h2>
                <div class="input-group">
                    <input type = "text" name="Nombre1" placeholder="Nombre" class="form-control mb-2" value="{{ Auth::user()->name }}">
                    <input type = "text" name="Apellido1" placeholder="Obtener de tabla cliente" class="form-control mb-2"> 
                    <input type = "text" name="Rut1" placeholder="Obtener de tabla cliente" class="form-control mb-2">
                    <input type = "text" name="Mail1" placeholder="Mail" class="form-control mb-2 "value="{{ Auth::user()->email }}">
                </div>

                <h2 class="bg-secondary text-light" >
                    DATOS DE ENVÍO
                </h2>
                <div class="input-group">
                    <input type = "text" name="Ciudad" placeholder="Ej: Springfield" class="form-control mb-2" >
                    <input type = "text" name="Comuna" placeholder="Ej: Springfield" class="form-control mb-2"> 
                    <input type = "text" name="Calle" placeholder="Ej: Av. Siempre viva" class="form-control mb-2">
                    <input type = "text" name="Número" placeholder="Ej: #9999" class="form-control mb-2 ">
                </div>

                <h2 class="bg-secondary text-light" >
                    DATOS DE VENDEDOR
                </h2>
                <div class="input-group">
                    @php
                        $existe = 0;
                    @endphp
                    @forelse ($user as $userItem)
                        @if($userItem->typeuser == 'Encargado de ventas') <!--Luego comprobar tambien por su disponibilidad-->
                            <input type = "text" name="Nombre2" placeholder="Nombre" class="form-control mb-2" value="{{ $userItem->name }}">
                            <input type = "number" name="ID2" placeholder="Id" class="form-control mb-2" value="{{ $userItem->id }}"> 
                            <input type = "text" name="Mail2" placeholder="Mail" class="form-control mb-2" value="{{ $userItem->email }}">
                            @php
                                $existe = 1;
                            @endphp
                            @break
                        @endif
                    @endforeach
                    @if($existe == 0)
                        <input type = "text" name="Nombre2" placeholder="Nombre" class="form-control mb-2" value="No existe vendedor disponible">
                        <input type = "text" name="ID2" placeholder="Id" class="form-control mb-2" value="No existe vendedor disponible"> 
                        <input type = "text" name="Mail2" placeholder="Mail" class="form-control mb-2" value="No existe vendedor disponible">
                    @endif
                </div>


                <h3 class="text-secondary" >
                        Observación
                    </h3>
                <div class="input-group">
                    <input type = "text" name="observacion" placeholder="..." class="form-control mb-2" >
                </div>

                <h2 class="bg-secondary text-light" >
                    LISTA DE PRODUCTOS
                </h2>

                <table class="table table-bordered">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
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
                    <br> <input type="text" name="numcard" class="form-control" placeholder="Ingrese numero de la tarjeta"> </br> 
                    </div>
                    <div class="input-group">
                    <br> <input type="text" name="mes" class="form-control" placeholder="Mes expiración"></br> &nbsp;&nbsp;
                        <input type="text" name="ano" class="form-control" placeholder="Año expiración">&nbsp;&nbsp;
                        <input type="text" name="CCV" class="form-control" placeholder="CCV">&nbsp;&nbsp;&nbsp;&nbsp;
                        <div  style="width:50px">
                            <img src="{{asset('credit_card.png')}}" class="img-fluid" alt="Responsive image">
                        </div>
                    </div>


                <a href="{{route('pedidos.store')}}" class="btn btn btn-outline-dark btn-lg btn-block">Pagar</a>
                <a href="{{route('pedidos.store')}}" class="btn btn btn-outline-dark btn-lg btn-block">Cancelar</a>
            </form>
        </div>
    </div>
@endsection 