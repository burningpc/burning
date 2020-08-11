@extends('layout')

@section('tittle')
  Reviews
@endsection
    
@section('content')

    <div class="container">
        <div class="bg-white py-4 px-4 shadow-lg rounded">
            <a href="{{route('mostrar_producto')}}" class="btn btn-secondary float-right">Volver</a>
            <a href="{{route('ingresar_review', $producto)}}" class="btn btn-info float-right">Agregar review</a>
            
            <h1 class= 'text-danger'> Reviews: </h1>
            <div class="image-container img-thumbnail text-center">
                <div class="name-container ">
                    <h4> {{$producto->Nombre}} </h4>  
                </div>
                @if(!@empty($producto->Imagen))
                        <img src="{{asset('storage').'/'.($producto->Imagen)}}" >
                @endif
                <div class="detail-container"> 
                    Descripción: {{$producto->Descripción}}
                </div>
                <div class="detail-container">
                    Código: {{$producto->id}}
                </div>
                <div class="price-container mt-auto">
                    <h4>${{$producto->Precio}}</h4>
                </div>
            </div>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Review</th>
                    <th scope="col">Nota</th>
                </tr>
                </thead>
                <tbody>
                @isset($reviews)
                @foreach($reviews as $review)
                    @if($review->id_producto == $producto->id)
                        <tr>
                            <th>{{$review->nombre_cliente}}</th>
                            <td>{{$review->review}}</td>
                            <td>{{$review->nota}}</td>
                        </tr>   
                    @endif
                @endforeach
                @endisset
                </tbody>
            </table>
        </div>
    </div>
@endsection