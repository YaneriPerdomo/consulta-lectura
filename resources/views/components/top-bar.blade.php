<div class="top-bar">
    <div class="container-xl top-bar__content">
        @auth
        <div class="top-bar__avatar">
            <img src="@if (Auth::user()->role_id == 2 || Auth::user()->role_id == 3)..@else.@endif/img/avatares/{{ Auth::user()->person->avatar->img }}.png" class="top-bar__avatar-img" alt="">
        </div>
        <div class="dropdown">
            <button class="button text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->user }}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><a class="dropdown-item" href="/configuracion">Configuracion</a></li>
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
        @else
        <button class="top-bar--login button ">
            <a href="{{ route('login') }}" class="header__link text-decoration-none text-white">Inicia Sesion</a>
        </button>
        @endauth
    </div>
</div>