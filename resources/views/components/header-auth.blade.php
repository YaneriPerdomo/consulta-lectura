<header class=" header">
    <nav class="container-xl flex-full__justify-content-between text-white">
        @switch(Auth::user()->rol_id)
            @case(1)
                    <div>
            <a href="{{ route('dashboard') }}" class="text-decoration-none text-white">
                Panel de control
            </a>
        </div>
        <div>
           <a href="{{ route('admin.user.index') }}"  class="text-decoration-none text-white">
             Usuario
           </a>
        </div>
        <div>
            <div class="dropdown">
                <button class="button text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Recursos Humanos
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('admin.employee.index') }}">Empleados</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.job.index') }}">Cargos</a></li>
                </ul>
            </div>
        </div>
        <div>
            <a href="{{ route('admin.room.index') }}" class="text-decoration-none text-white">
                Salas
            </a>
        </div>
           <div>
            <div class="dropdown">
                <button class="button text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Datos de Recursos de lectura
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('employee.author.index') }}">Autor</a></li>
                    <li><a class="dropdown-item" href="{{ route('employee.editorial.index') }}">Editorial</a></li>
                    <li><a class="dropdown-item" href="{{ route('employee.tag.index') }}">Etiqueta</a></li>
                </ul>
            </div>
        </div>
        <div>
            <div class="dropdown">
                <button class="button text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Recursos de lectura
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('configuration.index') }}">Libros</a></li>
                    <li><a class="dropdown-item" href="{{ route('configuration.index') }}">Comics</a></li>
                    <li><a class="dropdown-item" href="{{ route('configuration.index') }}">Editoriales</a></li>
                    <li><a class="dropdown-item" href="{{ route('configuration.index') }}">Periódicos</a></li>
                    <li><a class="dropdown-item" href="{{ route('configuration.index') }}">Revista</a></li>
                    <li><a class="dropdown-item" href="{{ route('configuration.index') }}">Otros</a></li>
                </ul>
            </div>
        </div>
            @break
        @case(3)
            <div>
            <a href="{{ route('dashboard') }}" class="text-decoration-none text-white">
                Panel de control
            </a>
        </div>
        <div>
            <div class="dropdown">
                <button class="button text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Datos de Recursos de lectura
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('employee.author.index') }}">Autor</a></li>
                    <li><a class="dropdown-item" href="{{ route('employee.editorial.index') }}">Editorial</a></li>
                    <li><a class="dropdown-item" href="{{ route('employee.tag.index') }}">Etiqueta</a></li>
                </ul>
            </div>
        </div>
        <div>
            <div class="dropdown">
                <button class="button text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Recursos de lectura
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('employee.book.index') }}">Libros</a></li>
                    <li><a class="dropdown-item" href="{{ route('configuration.index') }}">Comics</a></li>
                    <li><a class="dropdown-item" href="{{ route('configuration.index') }}">Editoriales</a></li>
                    <li><a class="dropdown-item" href="{{ route('configuration.index') }}">Periódicos</a></li>
                    <li><a class="dropdown-item" href="{{ route('configuration.index') }}">Revista</a></li>
                    <li><a class="dropdown-item" href="{{ route('configuration.index') }}">Otros</a></li>
                </ul>
            </div>
        </div>
       
        @break
            @default
                
        @endswitch
    </nav>
</header>