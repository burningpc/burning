@extends('layout')

@section('tittle')
  Productos
@endsection
    
@section('content')
    
    <div class="col-12 ">

        <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-danger">Productos On-fire!</h1>
      <!-- Coloque el boton en el nav bar para que se viera mas ordenado   
          @auth
            @if(Auth::user()->typeuser=='Administrador')
            <div class="btn-group btn-group-sm">
                <a class="btn btn-primary" href="{{ route('ingresar_producto') }}">Ingresar nuevo producto</a> 
            </div>
            @endif
        @endauth
        </div>
        -->

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
                            Stock Disponible: {{$item->Cantidad}}
                        </div>
                        <div class="price-container mt-auto">
                            <h4>${{$item->Precio}}</h4>
                        </div>
 
                        @auth
                        @if(Auth::user()->estado=='activo' or Auth::user()->typeuser=='Administrador')
                            @if($item->Cantidad > 0)
                            <a href="{{route('carrito.agregar', $item)}}" class="btn btn-primary ">Agregar al carrito</a>
                            @else
                            <a href="" class="btn btn-primary ">Stock Insuficiente</a>
                            @endif
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



