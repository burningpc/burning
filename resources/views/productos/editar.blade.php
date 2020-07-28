@extends('layout')

@section('tittle')
  Productos
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
            <h1 class= 'text-danger'> Editar producto: </h1>

            <form action="{{route('producto_update', $producto->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                
                @include('partials.validation-errors')
                
                <input type = "text" name="Nombre" placeholder="Nombre producto" class="form-control mb-2" value="{{$producto->Nombre}}">
                <input type = "text" name="Descripción" placeholder="Descripcion" class="form-control mb-2" value="{{$producto->Descripción}}">
                <input type = "text" name="Precio" placeholder="Precio" class="form-control mb-2" value="{{$producto->Precio}}">
                <input type = "text" name="Cantidad" placeholder="Cantidad" class="form-control mb-2" value="{{$producto->Cantidad}}">
                

                <div class="input-group mb-3">
                    <select id="Tipo_producto" type="text" class="form-control " name="Tipo_producto" required="">
                        <option value ="Procesador">Procesador</option>
                        <option value ="Tarjeta de video">Tarjeta de video</option>
                        <option value ="Monitor">Monitor</option>
                        <option value ="Fuente de poder">Fuente de poder</option>
                        <option value ="Placa madre">Placa madre</option>
                        <option value ="Teclado">Teclado</option>
                        <option value ="Gabinete">Gabinete</option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="Tipo_producto">Categoria</label>
                    </div>
                </div>

                <label for="Imagen">{{''}}</label>
                <img src="{{asset('storage').'/'.($producto->Imagen)}}" >
                <input type = "file" name="Imagen" class="form-control mb-2" value="">

           

                <button class="btn btn-warning btn-lg btn-block" type="submit">Editar producto</button>
                <a href="{{route('mostrar_producto')}}" class="btn btn btn-outline-dark btn-lg btn-block">Cancelar</a>
            </form>
        </div>
    </div>
@endsection