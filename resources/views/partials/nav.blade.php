<style>
.navbar-custom {
    background-color: #ff5500;
}
/* change the brand and text color */
.navbar-custom .navbar-brand,
.navbar-custom .navbar-text {
    color: rgba(255,255,255,.8);
}
/* change the link color */
.navbar-custom .navbar-nav .nav-link {
    color: rgba(255,255,255,.5);
}
/* change the color of active or hovered links */
.navbar-custom .nav-item.active .nav-link,
.navbar-custom .nav-item:hover .nav-link {
    color: #ffffff;
}
</style>

<nav class="navbar navbar-expand-sm  navbar-custom text-light nav justify-content-center">
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

    <li class="nav-item dropdown ">
      <a class="nav-link dropdown-toggle text-light" href="#" id="navbardrop" data-toggle="dropdown">
        Equpos
      </a>
      <div class="dropdown-menu" >
        <a class="dropdown-item" href="{{ route('mostrar_producto') }}">Ver Equipos</a>
        <a class="dropdown-item " href="{{ route('ingresar_producto') }}" >Ingresar nuevo producto </a>
      </div>
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

 
  @elseif(Auth::user()->typeuser=='Ensamblador')
      <li class="nav-item">
        <a class="nav-link text-light" href="{{ route('mostrar_producto') }}">Equipos</a>
      </li>

    <li class="nav-item">
      <a class="nav-link text-light" href="{{ route('mostrar_pedidos') }}">Confirmacion de envios</a>
    </li>
  @elseif(Auth::user()->typeuser=='Encargado de ventas')         
    

    <li class="nav-item">
      <a class="nav-link text-light"  href="{{ route('mostrar_producto') }}">Equipos</a>
    </li>

    <li class="nav-item dropdown ">
      <a class="nav-link dropdown-toggle text-light" href="#" id="navbardrop" data-toggle="dropdown">
        Ventas
      </a>
      <div class="dropdown-menu" >
        <a class="dropdown-item" href="{{ route('pedidos.resumen') }}">Ver Ventas</a>
        <a class="dropdown-item " href="{{ route('pedidos.indiv') }}" >Asignar ensamblador </a>
      </div>
    </li>
    <br/>
   
 
    
    


    
  @elseif(Auth::user()->typeuser=='Cliente')
  <li class="nav-item">
      <a class="nav-link text-light " href="{{ route('mostrar_producto') }}">Pc Armados</a>
    </li>
    <li class="nav-item pull-right">
      <a class="nav-link text-light" href="{{ route('mostrar_producto') }}">Ver Productos</a>
    </li>
    <li class="nav-item pull-right">
      <a class="nav-link text-light" href="{{ route('cliente.compras') }}">Ver Compras</a>
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
                {{ Auth::user()->name}}
              </a>
             
              <div class="dropdown-menu" >
                <a class="dropdown-item " href="{{ route('edit',Auth::user())}}"> Editar Datos de la cuenta</a>
                @if(Auth::user()->typeuser=="Cliente")
                <a class="dropdown-item " href="{{ route('ingresar' )}}">Editar Datos de envio</a>
                <a class="dropdown-item " href="{{ route('eliminarc', Auth::user()->id)}}">Eliminar cuenta </a>

                @endif
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

