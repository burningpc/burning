@extends('layout')

@section('tittle')
    compraido 
@endsection

@section('content') 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                    <div  style="width:100px">
                        <img src="{{asset('logo.png')}}" class="img-fluid " alt="Responsive image">
                    </div>
                    <br>
                    <h1 class="text-success  text-center">Su compra ha sido realizada</h1>
                    <h1 class="text-success  text-center">con exito!
                    </h1>
                    @php
                        $compra = $pedido->last();
                    @endphp
                            <div class="container-fluid">
                                <div class="row justify-content-around" id="">
                                    <div  style="width:50px">
                                        <img src="{{asset('verificado.png')}}" class="img-fluid " alt="Responsive image">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="container-fluid">
                                <div class="row justify-content-around" id="">
                                    <div class = "font-weight-bold">
                                        <div  class="card border-success mb-3" style="max-width: 800px;">
                                            <div class="card-body text-success">
                                                <h3> Detalles de la transacción </h3>
                                            </div>
                                            <div class="container-fluid">
                                                <div class="row justify-content-around" id="">
                                                    <div class = "font-weight-normal ">
                                                        <br>
                                                        <p> Comercio:   Burning-PC S.A. </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container-fluid">
                                                <div class="row justify-content-around" id="">
                                                    <div class = "font-weight-normal ">
                                                        <p> Total a Pagar: {{$compra->total}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container-fluid">
                                                <div class="row justify-content-around" id="">
                                                    <div class = "font-weight-normal ">
                                                        <p> Numero de Tarjeta: {{$compra->num_tarjeta}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container-fluid">
                                                <div class="row justify-content-around" id="">
                                                    <div class = "font-weight-normal ">
                                                        <p> Orden de compra: {{$compra->id}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container-fluid">
                                                <div class="row justify-content-around" id="">
                                                    <div class = "font-weight-normal ">
                                                        <p> Fecha: {{$compra->fecha_compra}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="row justify-content-around" id="">
                                    <div  style="width:250px">
                                        <img src="{{asset('medios.png')}}" class="img-fluid " alt="Responsive image">
                                    </div>
                                </div>
                            </div>
                    <br>
                            <div class="container-fluid">
                                <div class="row justify-content-around" id="">
                                    <div class="align-items-right">
                                        <a class="btn btn-danger" href="{{ route('home') }}">Volver al Inicio</a> 
                                        <a class="btn btn-success" href="{{ route('boleta.pdf') }}">Imprimir boleta</a> 
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
            
@endsection 