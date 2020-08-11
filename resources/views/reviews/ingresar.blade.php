@extends('layout')

@section('tittle')
  Reviews
@endsection
    
@section('content')

    <div class="container">
        @if(session('mensaje')) 
            <div class="alert alert-succes shadow">
                {{session('mensaje')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <a href="{{route('mostrar_producto')}}" class="btn btn btn-outline-dark btn-sm">Volver</a>
            </div>
        @endif
        <div class="bg-white py-4 px-4 shadow-lg rounded">
            <h1 class= 'text-danger'> Nueva review: </h1>

            <div class="container">
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
            </div>

            <form action="{{route('crear_review')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('partials.validation-errors')

                <input type = "text" name="id_producto" placeholder="" class="form-control mb-2 "readonly value="{{$producto->id}}">
                <input type = "text" name="nombre_cliente" placeholder="Nombre" class="form-control mb-2"readonly value="{{Auth::user()->name.' '.Auth::user()->lastname}} ">
                <input type = "text" name="review" placeholder="Review" class="form-control mb-2" value="{{old('review')}}">
                <div class="input-group mb-3">
                    <select id="nota" type="text" class="form-control " name="nota" required="">
                        <option value ="1">1</option>
                        <option value ="2">2</option>
                        <option value ="3">3</option>
                        <option value ="4">4</option>
                        <option value ="5">5</option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="Tipo_producto">Nota producto</label>
                    </div>
                </div>
                <button class="btn btn-warning btn-lg btn-block" type="submit">Agregar review</button>
                <a href="{{route('mostrar_producto')}}" class="btn btn btn-outline-dark btn-lg btn-block">Cancelar</a>
            </form>
        </div>
    </div>


@endsection