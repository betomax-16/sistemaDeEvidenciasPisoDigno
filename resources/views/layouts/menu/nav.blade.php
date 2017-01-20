<header>
    <div class="nav-bar">
        <a href="#" class="btn-menu">
            <button class="c-hamburger c-hamburger--htx" id="btn-menu">
                <span>toggle menu</span>
            </button> <span>
        <a href="{{url('/')}}">
            <img src="{{asset('imagenes/aplicacion/Logo.svg')}}" alt="logo_del_sitio ">
        </a>
      </span>
        </a>
        <div class="login-session">
          @if (Auth::guest())
          <a href="{{ url('/login') }}" class="btn orange logout" data-toggle="tooltip" data-placement="top" title="Iniciar Sesión">            
            <span class="fa fa-id-card" aria-hidden="true"></span>
          </a>
          @else
          <input type="text" value="{{ 'Bienvenido '.Auth::user()->nombre }}" disabled>
          <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn orange logout" data-toggle="tooltip" data-placement="top" title="Cerrar Sesión">
            <span class="fa fa-sign-out" aria-hidden="true"></span>
          </a>
          @endif
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </div>
    </div>
    <nav>
        <ul>
            <li id="inicio"><a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a></li>

            <li id="somos"><a  href="{{route('somos')}}"><i class="fa fa-users" aria-hidden="true"></i>¿Quiénes somos?</a></li>

            <li id="programas" class="sub-menu">
                <a style="color:#fff;">
                    <i class="fa fa-commenting" aria-hidden="true"></i>Programas<i class="fa fa-angle-down cared" aria-hidden="true"></i>
                </a>
                <ul class="children">
                    <a href="{{route('proyectosPorPrograma','VIVIENDA')}}"><li id="vivienda">Vivienda</li></a>
                    <a href="{{route('proyectosPorPrograma','SALUD')}}"><li id="salud">Salud</li></a>
                    <a href="{{route('proyectosPorPrograma','ALIMENTOS')}}"><li id="alimentos">Alimentos</li></a>
                    <a href="{{route('proyectosPorPrograma','EDUCACION')}}"><li id="educacion">Educación</li></a>
                    <a href="{{route('proyectosPorPrograma','MEDIO_AMBIENTE')}}"><li id="medio_ambiente">Medio Ambiente</li></a>
                </ul>
            </li>
            <li id="contacto"><a href="{{route('contacto')}}"><i class="fa fa-coffee" aria-hidden="true"></i>Contacto</a></li>
            @if (Auth::guest())
            <li id="login"><a href="{{ url('/login') }}"><i class="fa fa-address-card-o" aria-hidden="true"></i></i>Iniciar Sesión</a></li>
            @else
              @if(Auth::user()->role == 'ROLE_ADMIN')
                <li id="usuarios"><a href="{{route('usuario.index')}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Usuarios</a></li>
              @endif
              <li id="login" class="sub-menu">
                  <a style="color:#fff;">
                      <i class="fa fa-address-card-o" aria-hidden="true"></i></i>{{ Auth::user()->nombre }}<i class="fa fa-angle-down cared" aria-hidden="true"></i>
                  </a>
                  <ul class="children">
                      <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><li id="logout">

                        Cerrar Sesión

                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li></a>
                  </ul>
              </li>
            @endif
            <li id="donar"d><a href="{{route('donacion')}}"><i class="fa fa-heartbeat" aria-hidden="true"></i>Donar</a></li>
        </ul>
    </nav>
</header>
