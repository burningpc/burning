


<nav class="navbar navbar-expand-sm  bg-danger text-light nav justify-content-center">
  <!-- Brand -->
  <!-- Links -->
  <ul class="navbar-nav">
  @auth
  <a class="navbar-brand" href="{{ route('home') }}">
          <div  style="width:40px">
            <img src="{{asset('logo.png')}}" class="img-fluid" alt="Responsive image">
          </div>
        </a>
  @if(Auth::user()->typeuser=='Administrador')
    <li class="nav-item">
      <a class="nav-link text-light " href="{{ route('mostrar_producto') }}">Equipos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light" href="{{ route('facultades.show') }}">Reviews</a>
    </li>
    <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle " id="navbardrop" data-toggle="dropdown" >Usuarios</a>         
            <div class="dropdown-menu">
                <a class="dropdown-item " href="{{ route('register') }}">Agregar usuario de empleados</a>
                <form method="POST" action="{{ route('show') }}">
                    @csrf
                    <div class="form-group">
                                <button type="submit" class="btn ">
                                    {{('   Ver Usuarios') }}
                                </button>
                    </div>
                </form>
            </div>
            </li>
    <li class="nav-item">
      <a class="navbar-brand" href="{{ route('carrito.show') }}">
        <div  style="width:35px">
          <img src="{{asset('canasta.png')}}" class="img-fluid" alt="Responsive image">
        </div>
      </a>
    </li>
  @elseif(Auth::user()->typeuser=='Ensamblador')
      <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('academics.index') }}">Equipos</a>
      </li>
      <li class="nav-item">
      <a class="nav-link text-light" href="{{ route('facultades.show') }}">Reviews</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light" href="{{ route('facultades.show') }}">Confirmacion de envios</a>
    </li>
  @elseif(Auth::user()->typeuser=='Encargados de ventas')         
    <li class="nav-item">
      <a class="nav-link text-light" href="{{ route('academics.index') }}">Equipos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light" href="{{ route('academics.index') }}">Reclamos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light" href="{{ route('academics.index') }}">Confirmar stock</a>
    </li>
    <br/>
    <li class="nav-item">
      <a class="navbar-brand" href="{{ route('carrito.show') }}">
        <div  style="width:35px">
          <img src="{{asset('canasta.png')}}" class="img-fluid" alt="Responsive image">
        </div>
      </a>
    </li>
    <li class="nav-item">
    <li class="nav-item">
      <a class="nav-link text-light" href="{{ route('facultades.show') }}">Reviews</a>
    </li>
  @elseif(Auth::user()->typeuser=='Cliente')
  <li class="nav-item">
      <a class="nav-link text-light " href="{{ route('mostrar_producto') }}">Pc Armados</a>
    </li>
    <li class="nav-item pull-right">
      <a class="nav-link text-light" href="{{ route('mostrar_producto') }}">Ver Productos</a>
    </li>
    <li class="nav-item pull-right">
      <a class="nav-link text-light" href="{{ route('contact') }}">Dudas y/o Reclamos</a>
    </li>
    <li class="nav-item">
      <a class="navbar-brand" href="{{ route('carrito.show') }}">
        <div  style="width:35px">
          <img src="{{asset('canasta.png')}}" class="img-fluid" alt="Responsive image">
        </div>
      </a>
    </li>
  @endif    
                                                                                                                                                                                                                         
            <div  style="width:40px">
              <img src="{{asset('user.png')}}" class="img-fluid" alt="Responsive image">
            </div>
            <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle text-light" href="#" id="navbardrop" data-toggle="dropdown">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" >
                <a class="dropdown-item" href="#">Editar</a>
                <a class="dropdown-item " href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> 
                    Cerrar sesión 
                </a>
              </div>
            </li>

  </ul>
</nav>

<!-- VISTA PARA CUANDO NO SE ESTE LOGEADO -->
@else
    <li class="nav-item">
      <a class="nav-link text-light " href="{{ route('mostrar_producto') }}">Pc Armados</a>
    </li>
    <li class="nav-item pull-right">
      <a class="nav-link text-light" href="{{ route('mostrar_producto') }}">Ver Productos</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link {{ setActive('login') }}  text-light " href="{{ route('login') }}">Logearse</a></li>
    </ul>
    <li class="nav-item">
      <a class="nav-link {{ setActive('register') }}  text-light " href="{{ route('register') }}">Registrarse</a></li>
    </ul>
@endauth

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf 
</form>
</nav>

