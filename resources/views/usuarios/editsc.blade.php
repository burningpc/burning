@extends('layout')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">{{ __('Modificar Datos Personales' ) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update', $usuario ) }}">
                        @method('patch')
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuario->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $usuario->lastname }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$usuario->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('Rut (DNI )') }}</label>
                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ $usuario->dni }}" required autocomplete="dni" autofocus>

                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row mb-1">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modificar Datos') }}
                                </button>

                                <a class="btn btn-danger" href="{{route('home')}}">
                                    {{ __('Cancelar Modificación') }}
                                </a>

                                
                               
                            </div>
                        </div>
     
                    </form>
   
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


<!--<div class="form-group row">
                            <label for="lastname1" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos Paterno') }}</label>

                            <div class="col-md-6">
                                <input id="lastname1" type="text" class="form-control @error('lastname1') is-invalid @enderror" name="lastname1" value="{{ old('lastname1') }}" required autocomplete="lastname1" autofocus>

                                @error('lastname1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname2" class="col-md-4 col-form-label text-md-right">{{ __('Apellido Materno') }}</label>

                            <div class="col-md-6">
                                <input id="lastname2" type="text" class="form-control @error('lastname2') is-invalid @enderror" name="lastname2" value="{{ old('lastname2') }}" required autocomplete="lastname2" autofocus>

                                @error('lastname2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="commune" class="col-md-4 col-form-label text-md-right">{{ __('Comuna') }}</label>

                            <div class="col-md-6">
                                <input id="commune" type="text" class="form-control @error('commune') is-invalid @enderror" name="commune" value="{{ old('commune') }}" required autocomplete="commune" autofocus>

                                @error('commune')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="addres" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="addres" type="text" class="form-control @error('addres') is-invalid @enderror" name="addres" value="{{ old('addres') }}" required autocomplete="addres" autofocus>

                                @error('addres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Numero') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="integer" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus>

                                @error('addres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>-->