@extends('layout')

@section('tittle')
    Facultades
@endsection

@section('content')


    <div class="container">
    <h1> Añadir nueva facultad</h1>
        <form method="POST" action="{{ route('facultad.store') }}" class="was-validated">
        @csrf 
        <div class="d-flex justify-content-between align-items-center">
   
        
    @auth    
    @endauth
    </div>
    <hr>
    <p class="lead text-secondary">Decanos disponibles</p>
    <ul class="list-group">
    <li class="list-group-item border-0 mb-3 shadow-sm">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Decanos (ID)</label>
        <select class="form-control" id="exampleFormControlSelect1" name="id_Decano" required>
        @forelse ($usuarios as $usuariosItem)
            @if($usuariosItem->typeuser == 'Decano' and $usuariosItem->estado == 'Inactivo')
                <option>{{ $usuariosItem->id}}</option>
                
                
            @endif
                
        @empty
            <li class="list-group-item border-0 mb-3 shadow-sm">
                No hay usuario disponibles
            </li>
        @endforelse
        
        </select>
        </div>        
        </ul>   
    <div class="container">

  
            <div class="form-group">
                <label for="uname">Nombre:</label>
                <input type="text" class="form-control"  placeholder="Ingrese el nombre de la facultad" name="nombre" required>
                <div class="valid-feedback">Valido.</div>
                <div class="invalid-feedback">Porfavor ingrese un nombre correcto.</div>
            </div>

            <div class="form-group">
                <label for="pwd">Estado:</label>
                <input type="text" class="form-control"  placeholder="Ingrese el Estado" name="estado" required>
                <div class="valid-feedback">Valido.</div>
                <div class="invalid-feedback">Porfavor un estado valido.</div>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
    
       
@endsection