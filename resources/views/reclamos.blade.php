@extends('layout')

@section('tittle')
  Productos
@endsection
    
@section('content')
<div class="container">
    <div class="bg-white py-4 px-4 shadow-lg rounded">
        <h1 class= 'text-danger'> Reclamos </h1>
        
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Asunto</th>
                    <th scope="col">Mensaje</th>
                    <th scope="col">  </th>
                </tr>
                </thead>
                <tbody>
                @isset($reclamos)
                @foreach($reclamos as $reclamo)
                    <tr>
                        <th>{{$reclamo->nombre}}</th>
                        <td>{{$reclamo->email}}</td>
                        <td>{{$reclamo->asunto}}</td>
                        <td>{{$reclamo->msj}}</td>  
                        <td>
                            <a href="#" class="btn btn-info btn-sm">Responder</a>   
                        </td>   
                        </tr>   
                @endforeach
                @endisset
                </tbody>
            </table>
        </div>
    </div>



@endsection