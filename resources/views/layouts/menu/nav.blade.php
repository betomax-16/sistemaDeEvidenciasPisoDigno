<section class="Top">
    <header class="encavezado navbar-fixed-top" role="banner">
        <div class="container">
            <a href="{{url('/')}}" class="logo">
                <img src="{{asset('images/Logo.svg')}}" alt="logo_del_sitio ">
            </a>
            <button class="c-hamburger c-hamburger--htx boton-menu hidden-md-up" data-toggle="collapse" data-target="#menu-principal" aria-expanded="false">
                <span>toggle menu</span>
            </button>


            <nav class="collapse" id="menu-principal">
                <ul>
                    <li><a href="{{url('/')}}">Inicio</a></li>
                    <li><a href="{{url('/').'#nosotros'}}">Nosotros</a></li>
                    <li><a href="{{url('/').'#mision'}}">Mision y Vision</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          Programas
                      </a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('proyectosPorPrograma','VIVIENDA')}}">Vivienda</a></li>
                        <li><a href="{{route('proyectosPorPrograma','SALUD')}}">Salud</a></li>
                        <li><a href="{{route('proyectosPorPrograma','ALIMENTOS')}}">Alimentos</a></li>
                        <li><a href="{{route('proyectosPorPrograma','EDUCACION')}}">Educacion</a></li>
                        <li><a href="{{route('proyectosPorPrograma','MEDIO_AMBIENTE')}}">Medio Ambiente</a></li>
                      </ul>
                    </li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @else
                      @if(Auth::user()->role == 'ROLE_ADMIN')
                        <li><a href="{{route('usuario.index')}}">Usuarios</a></li>
                      @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->nombre }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>
</section>
