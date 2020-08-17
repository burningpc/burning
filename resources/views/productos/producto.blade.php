@extends('layout')

@section('tittle')
  Productos
@endsection
    
@section('content')
    
    <div class="col-12 ">

        <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-danger">Productos On-fire!</h1>
   
        </div>
        

        <div class="row row-cols-1 row-cols-md-4">
        
            @isset($productos)
                @foreach($productos as $item)
                <div class="col mb-3">
                    <div class="card h-100">
                        <div class="name-container ">
                            <h4> {{$item->Nombre}} </h4>   
                        </div>
                        <div class="image-container img-thumbnail ">
                            @if(!@empty($item->Imagen))
                                    <img src="{{asset('storage').'/'.($item->Imagen)}}" >
                            @endif
                        </div>
                        <div class="detail-container"> 
                            Descripción: {{$item->Descripción}}
                        </div>
                        <div class="detail-container">
                            Código: {{$item->id}}
                        </div>
                        <div class="detail-container"> 
                            Stock Disponible: {{$item->Cantidad}}
                        </div>
                        <div class="price-container mt-auto">
                            <h4>${{$item->Precio}}</h4>
                        </div>
                        
  
                        @auth
                            @if($item->Cantidad > 0)
                                @if(Auth::user()->typeuser == 'Cliente')
                                    <a href="{{route('carrito.agregar', $item)}}" class="btn btn-primary ">Agregar al carrito</a>
                                @endif
                            {{--<a href="{{route('ingresar_review', $item)}}" class="btn btn-secondary ">Agregar review</a>--}}
                            <a href="{{route('mostrar_review', $item)}}" class="btn btn-warning ">Ver reviews</a>
                            @else
                            <a href="" class="btn btn-primary ">Stock Insuficiente</a>
                            @endif
                            @if(Auth::user()->typeuser=='Administrador' || Auth::user()->typeuser=='Encargado de inventario')
                            <a href="{{route('editar_producto', $item)}}" class="btn btn-secondary ">Editar</a>
                            
                            <form action="{{route('eliminar_producto', $item)}}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn navbar-custom btn-block" type="submit" onclick="return confirm('¿Borrar producto?') ">Eliminar</button>
                            </form>     
                        @endif
                        @endauth
                    </div>
                </div>
                @endforeach
            @endisset

        </div>
    </div>

@endsection



