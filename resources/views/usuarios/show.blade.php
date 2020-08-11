@extends('layout')

@section('tittle')
    usuarios
@endsection


@section('content')
@if(Auth::user()->typeuser=='Administrador')

    
    <div class="container">

        

        <div class="bg-white p-5 shadow rounded">

        <div class="page-header">
            <h1>Lista de usuarios </h1>
        </div>

        <table class="table table-bordered">
            <thead class="bg-primary">
                <tr> 
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipo Usuario</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            </tbody>
            @foreach($usuarios as $usuario)
                <tr> 
                    <td>{{ $usuario->name }}</td> 
                    <td><span class="badge badge-primary badge-pill">{{ $usuario->email }}</span></td>
                    <td>{{ $usuario->typeuser }}</td>
                    <td>{{ $usuario->estado }}</td>
                    <td>
                        <div class="btn-group btn-group-y6">
                            <a class="btn btn-primary" href="{{ route('edit', $usuario)}}">Editar </a>
                            @if( Auth::user()->email == $usuario->email)
                            <a class="btn btn-danger" href="#">Eliminar </a>
                            @else(Auth::user()->email =! $usuario->email)
                            <a class="btn btn-danger" href="{{ route('eliminar', $usuario->id)}}">Eliminar </a>
                            @endif()
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        

    </div>
 @endif

@endsection

