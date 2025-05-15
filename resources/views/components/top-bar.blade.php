<div class="top-bar">
    <div class="container-xl top-bar__content">
        @auth
            @switch(Auth::user()->rol_id)
                @case(1)
                    <div class="top-bar__avatar">
                        <img src="{{ $relativePath ?? '../'}}img/avatares/default.png" class="top-bar__avatar-img" alt="">
                    </div>
                    <div class="dropdown">
                        <button class="button text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hola, {{ Auth::user()->user }}!
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Panel de control</a></li>
                            <li><a class="dropdown-item" href="{{ route('configuration.index') }}">Configuracion</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="#">Historial</a></li>
                            <hr>
                            <li>
                                <form action="./logout" method="POST">
                                    @csrf
                                    <button class="button text-black">Cerrar sesion</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @break    
               
                @case (2)
                    <div class="top-bar__avatar">
                        <img src="@if (Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3)..@else.@endif/img/avatares/{{ Auth::user()->person->avatar->img }}.png" class="top-bar__avatar-img" alt="">
                    </div>
                    <div class="dropdown">
                        <button class="button text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->user }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('user.profile.recent') }}">Perfil</a></li>
                            <li><a class="dropdown-item" href="{{ route('configuration.index') }}">Configuracion</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="#">Historial</a></li>
                            <li><a class="dropdown-item" href="#">Favoritos</a></li>
                            <li><a class="dropdown-item" href="#">Mis listas</a></li>
                            <li><a class="dropdown-item" href="#">Valoraciones</a></li>
                            <hr>
                            <li>
                                <form action="./logout" method="POST">
                                    @csrf
                                    <button class="button text-black">Cerrar sesion</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @break
                @case(3)
                     <div class="top-bar__avatar">
                        <img src="@if (Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3)..@else.@endif/img/avatares/{{ Auth::user()->employee->avatar->img }}.png" class="top-bar__avatar-img" alt="">
                    </div>
                    <div class="dropdown">
                        <button class="button text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->user }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><a class="dropdown-item" href="{{ route('configuration.index') }}">Configuracion</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="#">Historial</a></li>
                            <li><a class="dropdown-item" href="#">Favoritos</a></li>
                            <li><a class="dropdown-item" href="#">Mis listas</a></li>
                            <li><a class="dropdown-item" href="#">Valoraciones</a></li>
                            <hr>
                            <li>
                                <form action="./logout" method="POST">
                                    @csrf
                                    <button class="button text-black">Cerrar sesion</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @break
            @default
                <span>Hubo un error de carga</span>
            @endswitch
        @else
        <button class="top-bar--login button ">
            <a href="{{ route('logout') }}" class="header__link text-decoration-none text-white">Inicia Sesion</a>
        </button>
        @endauth
    </div>
</div>