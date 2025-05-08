<header class=" header">
    <nav class="container-xl flex-full__justify-content-between text-white">
        <div>
            <a href="{{ route('dashboard') }}" class="text-decoration-none text-white">
                Panel de control
            </a>
        </div>
        <div>
            Usuario
        </div>
        <div>
            <div class="dropdown">
                <button class="button text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Recursos Humanos
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('employee.create-account') }}">Empleados</a></li>
                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Cargos</a></li>
                </ul>
            </div>
        </div>
        <div>
            <a href="{{ route('dashboard') }}" class="text-decoration-none text-white">
                Departamento
            </a>
        </div>
        <div>
            <div class="dropdown">
                <button class="button text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Recursos de lectura
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('configuration') }}">Libros</a></li>
                    <li><a class="dropdown-item" href="{{ route('configuration') }}">Comics</a></li>
                    <li><a class="dropdown-item" href="{{ route('configuration') }}">Editoriales</a></li>
                    <li><a class="dropdown-item" href="{{ route('configuration') }}">Periódicos</a></li>
                    <li><a class="dropdown-item" href="{{ route('configuration') }}">Revista</a></li>
                    <li><a class="dropdown-item" href="{{ route('configuration') }}">Otros</a></li>
                </ul>
            </div>
        </div>
        
    
    </nav>
</header>