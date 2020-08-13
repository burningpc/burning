@extends('layout2')

@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container">
    <br>

        <div  style="width:1000px">
            <img src="{{asset('CABEZA_BOLETA.png')}}" class="img-fluid " alt="Responsive image">
        </div>
            
        <h2 class="bg-secondary text-light text-center" >
             DATOS PERSONALES
        </h2>
            @php
                $compra = $pedido->last();
                $cliente = auth::user();
                $vendedor = $cliente;
                $d = $envio->last();
            @endphp
            @foreach($user as $us)
                @if($us->id == $compra->rut_vendedor)
                    @php
                        $vendedor = $us;
                    @endphp
                @endif
            @endforeach
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Nombre: {{$cliente->name}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Apellido: {{$cliente->lastname}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Rut: {{$cliente->dni}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Correo electronico: {{$cliente->email}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <h2 class="bg-secondary text-light text-center" >
                DATOS DE ENVÍO
            </h2>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Ciudad:  {{$d->city}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Comuna: {{$d->commune}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Dirección: {{$d->addres}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Número de casa: {{$d->number}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <h2 class="bg-secondary text-light text-center" >
                DATOS DE VENDEDOR
            </h2>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Id vendedor:  {{$vendedor->id}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Nombre : {{$vendedor->name}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Correo electronico: {{$vendedor->email}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Id ensamblador: {{$compra->rut_ensamblador}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <h2 class="bg-secondary text-light text-center" >
                DATOS DE COMPRA
            </h2>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Id Pedido: {{$compra->id}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Productos : {{$compra->infoCarrito}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Total: {{$compra->total}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Fecha de Compra: {{$compra->fecha_compra}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">Descripción: {{$compra->descripcion}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="container-fluid">
                <div class="row justify-content-around" id="">
                    <div class = "font-weight-normal ">
                        <h4 class="text-center">N° Tarjeta: {{$compra->num_tarjeta}}</h4>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h1 class="text-success  text-center">Gracias por tu compra!</h1>


</div>  
    
@endsection