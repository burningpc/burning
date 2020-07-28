@extends('layout')

@section('tittle') 
    Registro
@endsection

    @section('content')


    <div class="container">
        <div class="bg-white p-5 shadow rounded">
            <div class="d-flex justify-content-between align-items-center">
                <h1> {{ $facultades->nombre}} </h1>  
            </div>
            ID Facultad: {{ $facultades->id}}<br>
            Estado: {{ $facultades->estado }}<br>
                @auth
                <?php
                    $aux = $usuarios[0];
                    $existe = 'no';
                ?>
                
                @if(Auth::user()->typeuser=='Administrador')
                    @foreach($usuarios as $usuariosItem)
                        @if($facultades->id_Decano ==  $usuariosItem->id)
                            <?php
                                $aux = $usuariosItem;
                                $existe = 'si';
                            ?>
                        @endif
                    @endforeach
                    @if($existe === 'si')
                        ID Decano: {{ $facultades->id_Decano }}<br>
                    @else
                        ID Decano:<br> 
                        <!-- Modal -->
                        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Campo decano vacío!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>   

                                    <script>
                                        $(document).ready(function()
                                        {
                                            $("#Modal").modal("show");
                                        });
                                    </script>
                                <div class="modal-body">
                                    No existe un(a) decano(a) asociado(a) a la facultad<br>
                                    Por favor actualice a un(a) nuevo(a) decano(a)<br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    <a class="btn btn-primary" href="{{ route('facultades.edit', $facultades) }}">Editar</a>
                                </div>
                        |   </div>
                        </div>
                    </div>
                    @endif
                    <p class="text-black-50"> {{ $facultades->created_at->diffForHumans() }} </p>
                    <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('facultades.show') }}">Regresar</a>
                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-primary" href="{{ route('facultades.edit', $facultades) }}">Editar</a>
                        <form method="POST" action="{{ route('facultades.usermod', $aux) }}">
                            @csrf @method('PATCH')
                            <button class="btn btn-danger" >Eliminar</button>
                        </form>
                    </div>
                @endif
                @endauth
            </div>
        </div>
        <hr>
    </div>

    @endsection
