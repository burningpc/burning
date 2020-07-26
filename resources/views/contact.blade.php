@extends('layout')

@section('tittle')
    contact
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6 mx-auto">    
            <form class="bg-white shadow rounded py-3 px-4" 
            method="POST" action="{{ route('messages.store') }}">
                @csrf
                <h1 class="display-4">@lang('Contact')</h1>
                <hr>
                <div class="form-group">
                    <label form="name">Nombre</label>
                    <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror"
                        name="name" 
                        placeholder="Nombre..." 
                        value="{{old('name')}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                <label form="email">Email</label>
                    <input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror"
                        type="text" 
                        name="email" 
                        placeholder="Email..." 
                        value="{{old('email')}}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                <label form="subject">Asunto</label>
                    <input class="form-control bg-light shadow-sm @error('subject') is-invalid @else border-0 @enderror"
                        name="subject" 
                        placeholder="Asunto..." 
                        value="{{old('subject')}}">
                        @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                <label form="content">Mensaje</label>
                    <textarea class="form-control bg-light shadow-sm @error('content') is-invalid @else border-0 @enderror"
                        name="content" 
                        placeholder="Mensaje...">{{old('content')}}</textarea><br>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <button class="btn btn-primary btn-lg btn-block">Enviar</button>
            </form>
        </div>
    </div>

</div>

@endsection