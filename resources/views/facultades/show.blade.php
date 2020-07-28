@extends('layout')

@section('tittle')
    Facultades
@endsection

@section('content')
    @if($facultades)
    
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="display-4 mb-0">Facultades</h1>
        
        @auth
        @if(Auth::user()->typeuser=='Cliente')
            <a class="btn btn-primary" href="{{ route('facultades.add_facultad') }}">Ingresar Facultad</a> 
        @endif
        @endauth
        </div>
        <hr>
        <p class="lead text-secondary">Facultades actuales</p>
    </div>
    
    <div class="container">
		<div class="row">
        @foreach($facultades as $facultadesItem)
            <div class="col-sm">
                <br>   
                <div class="card bg-dark text-white" style="width:350px">
                    @if($facultadesItem->nombre == 'Facultad de Medicina')
                        <img class="card-img-top" src="{{asset('1.jpg')}}" alt="Card image">
                    @elseif($facultadesItem->nombre == 'Facultad de Ciencias de la Educacion')
                        <img class="card-img-top" src="{{asset('2.jpg')}}" alt="Card image">
                    @elseif($facultadesItem->nombre == 'Facultad de Ciencias de la Salud')
                        <img class="card-img-top" src="{{asset('3.jpg')}}" alt="Card image">
                    @elseif($facultadesItem->nombre == 'Facultad de Ciencias de la Ingenieria')
                        <img class="card-img-top" src="{{asset('4.jpg')}}" alt="Card image">
                    @elseif($facultadesItem->nombre == 'Facultad de Ciencias Sociales y Economicas')
                        <img class="card-img-top" src="{{asset('5.jpg')}}" alt="Card image">
                    @elseif($facultadesItem->nombre == 'Facultad de Ciencias Agrarias y Forestales')
                        <img class="card-img-top" src="{{asset('6.jpg')}}" alt="Card image">
                    @elseif($facultadesItem->nombre == 'Facultad de Ciencias Basicas')
                        <img class="card-img-top" src="{{asset('7.jpg')}}" alt="Card image">
                    @elseif($facultadesItem->nombre == 'Facultad de Ciencias Religiosas y Filosoficas')
                        <img class="card-img-top" src="{{asset('8.jpg')}}" alt="Card image">
                    @elseif($facultadesItem->nombre == 'Instituto de Estudios Generales')
                        <img class="card-img-top" src="{{asset('9.jpg')}}" alt="Card image">
                    @else
                        <img class="card-img-top" src="{{asset('10.jpg')}}" alt="Card image">
                    @endif
                    <div class="card-img-overlay">
                    <a class="text-secondary d-flex justify-content-between align-items-center " href="{{ route('facultades.indiv', $facultadesItem)}}"> 
                        <span class="font-weight-bold ">     
                            Nombre: {{ $facultadesItem->nombre }} 
                        </span> 
                        <span class="text-black-50"> 
                            {{ $facultadesItem->created_at->format('d/m/Y')}} 
                        </span> 
                    </a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <li> No hay facultades para mostrar </li>
    @endif



@endsection

