<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesion | Biblioteca B</title>
    <link rel="stylesheet" href="./css/utilities.css">
    <link rel="stylesheet" href="./css/layouts/_base.css">
    <link rel="stylesheet" href="./css/components/_button.css">
    <link rel="stylesheet" href="./css/components/_footer.css">
    <link rel="stylesheet" href="./css/components/_form.css">
    <link rel="stylesheet" href="./css/components/_header.css">
    <link rel="stylesheet" href="./css/components/_input.css">
    <link rel="stylesheet" href="./css/components/_top-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>

<body class="h-100 d-flex flex-column">
    <x-top-bar></x-top-bar>
    <x-header></x-header>

    <main class="flex__grow-2">
        <article class="flex-full__justify-content-center h-100 ">
            <form action="/iniciar-sesion" class="form" method="POST">
                @csrf
                <div class="flex-full__justify-content-center gap-3">
                    <span>¿No tienes una cuenta en Recursos Bi?</span>
                    <a href="{{route('create-account')}}" class="text-decoration-none">
                        <button class="button button--no-background text-blue" type="button">
                            Registrarte
                        </button>
                    </a>
                </div>
                <legend>Ingresa a Recursos Bi</legend>
                @error('user')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                @if (session('alert-success'))
                <div class="alert alert-success">
                    {{ session('alert-success') }}
                </div>
                @endif
                <div class="form__item">
                    <label for="" class="form__label">Usuario</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text" id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="search" name="user" class="form-control "
                            placeholder="Yane3" aria-label="Username"
                            aria-describedby="basic-addon1"
                            autofocus
                            value="{{ old('user') }}">
                    </div>
                </div>
                <br>
                <div class="form__item">
                    
                    <label for="" class="form__label">Contraseña</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text" id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="password" name="password" class="form-control "
                            placeholder="*******" aria-label="Username"
                            aria-describedby="basic-addon1"
                            value="">
                    </div>
                </div>
                <hr>
                <div class="form__button w-100">
                    <button class="button button--color-blue w-100" type="submit">
                        Iniciar Sesion

                    </button>
                </div>
            </form>
        </article>
    </main>
    <x-footer></x-footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>