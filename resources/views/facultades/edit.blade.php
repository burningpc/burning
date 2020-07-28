@extends('layout')

@section('tittle')
    Facultades
@endsection

@section('content')
                    @if($facultad->nombre == 'Facultad de Medicina')
                    <div >
                        <img class="card-img-top "  src="{{asset('banner1.jpg')}}" >
                        <br>
                    </div>
                    @elseif($facultad->nombre == 'Facultad de Ciencias de la Educacion')
                    <div >
                        <img class="card-img-top "  src="{{asset('banner2.jpg')}}" >
                        <br>
                    </div>
                    @elseif($facultad->nombre == 'Facultad de Ciencias de la Salud')
                    <div >
                        <img class="card-img-top "  src="{{asset('banner3.jpg')}}" >
                        <br>
                    </div>
                    @elseif($facultad->nombre == 'Facultad de Ciencias de la Ingenieria')
                    <div >
                        <img class="card-img-top "  src="{{asset('banner4.jpg')}}" >
                        <br>
                    </div>
                    @elseif($facultad->nombre == 'Facultad de Ciencias Sociales y Economicas')
                    <div >
                        <img class="card-img-top "  src="{{asset('banner5.jpg')}}" >
                        <br>
                    </div>
                    @elseif($facultad->nombre == 'Facultad de Ciencias Agrarias y Forestales')
                    <div >
                        <img class="card-img-top "  src="{{asset('banner6.jpg')}}" >
                        <br>
                    </div>
                    @elseif($facultad->nombre == 'Facultad de Ciencias Basicas')
                    <div >
                        <img class="card-img-top "  src="{{asset('banner7.jpg')}}" >
                        <br>
                    </div>
                    @elseif($facultad->nombre == 'Facultad de Ciencias Religiosas y Filosoficas')
                    <div >
                        <img class="card-img-top "  src="{{asset('banner8.jpg')}}" >
                        <br>
                    </div>
                    @elseif($facultad->nombre == 'Instituto de Estudios Generales')
                    <div >
                        <img class="card-img-top "  src="{{asset('banner9.jpg')}}" >
                        <br>
                    </div>
                    @else
                    <div >
                        <img class="card-img-top "  src="{{asset('banner10.jpg')}}" >
                        <br>
                    </div>
                    @endif
    <div class="container">
    <br>
    <h1> Actualizar datos de {{$facultad->nombre}}</h1>
        <form method="POST" action="{{ route('facultades.update', $facultad) }}" class="was-validated">
        @csrf @method('PATCH')
        <?php
            $aux = 'no';
        ?>
        @foreach($usuarios as $usuariosItem)
            @if($facultad->id_Decano == $usuariosItem->id)
            <?php
                $aux = 'si';
            ?>
            @endif
        @endforeach
    @if($aux === 'no')
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
    @else
            <div class="form-group">
                <input type="hidden" id="id_Decano" name="id_Decano" value="{{ $facultad->id_Decano }}">
            </div>

            

    @endif
        
            
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control"  value="{{ $facultad->nombre }}" name="nombre" required>
                <div class="valid-feedback">Valido.</div>
                <div class="invalid-feedback">Porfavor ingrese un nombre correcto.</div>
            </div>

        

            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control"  value="{{ $facultad->estado }}" name="estado" required>
                <div class="valid-feedback">Valido.</div>
                <div class="invalid-feedback">Porfavor un estado valido.</div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection