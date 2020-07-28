@extends('layout')

@section('tittle')
    usuarios
@endsection


@section('content')
@if(Auth::user()->typeuser=='Administrador')
    <div class="container">
        <div class="bg-white p-5 shadow rounded">
        @foreach($usuarios as $usuario)
            <div class="d-flex justify-content-between align-items-center">
                <h3> {{ $usuario->name }} </h3>         
            </div>
            <p class="text-secondary"> 
                Nombre: {{ $usuario->name }}      email: {{ $usuario->email }}      Tipo de usuario: {{ $usuario->typeuser }}      Estado: {{ $usuario->estado }} 
            </p>
            <p class="text-black-50"> {{ $usuario->created_at->diffForHumans() }} </p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group btn-group-y6">
                        <a class="btn btn-primary" href="{{ route('edit', $usuario)}}">Editar </a>
                        @if( Auth::user()->email == $usuario->email)
                        <a class="btn btn-danger" href="#">Eliminar </a>
                        @else(Auth::user()->email =! $usuario->email)
                        <a class="btn btn-danger" href="{{ route('eliminar', $usuario->id)}}">Eliminar </a>
                        @endif()

                </div>
                    </div>
        @endforeach()

    </div>
 @endif

@endsection

