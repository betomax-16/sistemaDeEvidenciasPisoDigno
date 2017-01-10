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
        <a href="#" class="btn orange donar">Donar</a>
    </div>
    <nav>
        <ul>
            <li class="active"><a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a></li>
            <li><a href="{{route('contacto')}}"><i class="fa fa-coffee" aria-hidden="true"></i>Contacto</a></li>
            <li class="sub-menu">
                <a href="#">
                    <i class="fa fa-commenting-o" aria-hidden="true"></i>Programas<i class="fa fa-angle-down cared" aria-hidden="true"></i>
                </a>
                <ul class="children">
                    <li><a href="{{route('proyectosPorPrograma','VIVIENDA')}}">Vivienda</a></li>
                    <li><a href="{{route('proyectosPorPrograma','SALUD')}}">Salud</a></li>
                    <li><a href="{{route('proyectosPorPrograma','ALIMENTOS')}}">Alimentos</a></li>
                    <li><a href="{{route('proyectosPorPrograma','EDUCACION')}}">Educación</a></li>
                    <li><a href="{{route('proyectosPorPrograma','MEDIO_AMBIENTE')}}">Medio Ambiente</a></li>
                </ul>
            </li>
            @if (Auth::guest())
            <li><a href="{{ url('/login') }}"><i class="fa fa-heartbeat" aria-hidden="true"></i>Iniciar Sesión</a></li>
            @else @if(Auth::user()->role == 'ROLE_ADMIN')
            <li><a href="{{route('usuario.index')}}"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Usuarios</a></li>
            @endif
            <li class="sub-menu">
                <a href="#">
                    <i class="fa fa-address-card-o" aria-hidden="true"></i></i>{{ Auth::user()->nombre }}<i class="fa fa-angle-down cared" aria-hidden="true"></i>
                </a>
                <ul class="children">
                    <li>
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Cerrar Sesión
                  </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            @endif
            <li class="donar"><a href=""><i class="fa fa-paw" aria-hidden="true"></i>Donar</a></li>
        </ul>
    </nav>
</header>
