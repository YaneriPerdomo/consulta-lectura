<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrarte | Recursos B</title>
    <link rel="stylesheet" href="./css/utilities.css">
    <link rel="stylesheet" href="./css/layouts/_base.css">
    <link rel="stylesheet" href="./css/components/_button.css">
    <link rel="stylesheet" href="./css/components/_input.css">
    <link rel="stylesheet" href="./css/components/_footer.css">
    <link rel="stylesheet" href="./css/components/_form.css">
    <link rel="stylesheet" href="./css/components/_header.css">
    <link rel="stylesheet" href="./css/components/_top-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
    </style>
</head>

<body class="h-100 d-flex flex-column">
    <x-top-bar></x-top-bar>
    <x-header></x-header>

    <main class="flex__grow-2">
        <article class="flex-full__justify-content-center h-100 ">
            <form action="" class="form form--create-account" method="POST">
                @csrf

                <div class="flex-full__justify-content-center gap-3">
                    <span>¿Si tienes una cuenta en Recursos Bi?</span>
                    <a href="{{route('login')}}" class="text-decoration-none">
                        <button class="button button--no-background text-blue" type="button">
                            Iniciar sesion
                        </button>
                    </a>
                </div>
                <h1><b>Ingresa a <i>Recursos Bi</i></b></h1>
                <!--                 @if ($errors->any())
                <div class="form__validation">
                    <ul class="form__validation-content">
                        @foreach ($errors->all() as $error )
                        <li class="form__validation-messager">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div> @endif-->

                <fieldset>
                    <legend class="form__subtitle"><b>Datos Personales</b></legend>
                    <div class="form__item">
                        <label for="" class="form__label form__label--required">Nombre y apellido</label>
                        <div class="input-group ">
                            <span class="form__icon input-group-text @error ('name_lastname') is-invalid--border @enderror" id="basic-addon1"><i class="bi bi-search "></i></span>
                            <input type="text" name="name_lastname" class="form-control @error ('name_lastname') is-invalid @enderror"
                                placeholder="Yaneri Perdomo" aria-label="Username"
                                aria-describedby="basic-addon1"
                                autofocus
                                value="{{ old('name_lastname') }}">
                        </div>
                        @error('name_lastname')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form__item">
                        <label for="" class="form__label form__label--required">Cédula de identidad</label>
                        <div class="input-group ">
                            <span class="form__icon input-group-text p-0 @error ('cedula') is-invalid--border @enderror" id="basic-addon1">
                                <div class="input-group">
                                    <select id="type-indicator" name="identity_card_id" class="form-control form__select " required>
                                        <option value="" selected disabled>Seleccione una opción</option>
                                        <option value="1"> Venezolano cedulado (V) </option>
                                        <option value="2"> Extranjero cedulado (E)</option>
                                        <option value="3"> Pasaporte</option>
                                    </select>
                                </div>
                            </span>
                            <input type="text" name="cedula" class="form-control @error ('cedula') is-invalid @enderror  "
                                placeholder="87654321" aria-label="Username"
                                aria-describedby="basic-addon1"
                                autofocus
                                value="{{ old('cedula') }}">
                        </div>
                        @error('cedula')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form__item">
                        <label for="" class="form__label form__label--required">Correo electronico</label>
                        <div class="input-group ">
                            <span class="form__icon input-group-text  @error ('email') is-invalid--border @enderror" id="basic-addon1"><i class="bi bi-search "></i></span>
                            <input type="search" name="email" class="form-control @error ('email') is-invalid @enderror "
                                placeholder="m@example.com" aria-label="Username"
                                aria-describedby="basic-addon1"
                                autofocus
                                value="{{ old('email') }}">
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form__item">
                        <label for="" class="form__label form__label--required">Genero</label>
                        <div class="input-group w-100">
                            <span class="form__icon input-group-text p-0 w-100" id="basic-addon1">
                                <div class="input-group">
                                    <select id="room_id" name="room_id" class="form-control form__select " required>
                                        <option value="" disabled selected>Seleccione una opcion</option>
                                        <option value="1">F</option>
                                        <option value="2">M</option>
                                    </select>
                                </div>
                            </span>
                        </div>
                    </div>
                    
                </fieldset>
                
                <fieldset>
                    <legend class="form__subtitle" ><b>Datos de Usuario</b></legend>

                <div class="form__item form__item--avatar">
                        <label for="" class="form__label">Selecciona un avatar</label>
                        <p class="d-flex gap-2 form__avatar-content flex-wrap">
                            <label for="1" data-checked="true">
                                <input type="radio" id="1" name="avatar_id" value="1" checked class="input-radio--hidden ">
                                <img src="./img/avatares/default.png" alt="" class="form__avatar-img">
                            </label>
                            <label for="2">
                                <input type="radio" id="2" name="avatar_id" value="2" class="input-radio--hidden">
                                <img src="./img/avatares/boy.png" alt="" class="form__avatar-img">
                            </label>
                            <label for="3">
                                <input type="radio" id="3" name="avatar_id" value="3" class="input-radio--hidden">
                                <img src="./img/avatares/girl.png" alt="" class="form__avatar-img">
                            </label>
                            <label for="4">
                                <input type="radio" id="4" name="avatar_id" value="4" class="input-radio--hidden">
                                <img src="./img/avatares/dinosaur.png" alt="" class="form__avatar-img">
                            </label>
                            <label for="5">
                                <input type="radio" id="5" name="avatar_id" value="5" class="input-radio--hidden">
                                <img src="./img/avatares/young-snow-m.png" alt="" class="form__avatar-img">
                            </label>
                            <label for="6">
                                <input type="radio" id="6" name="avatar_id" value="6" class="input-radio--hidden">
                                <img src="./img/avatares/young-snow-f.png" alt="" class="form__avatar-img">
                            </label>
                        </p>
    
                    </div>
                    <div class="form__item">
                        <label for="" class="form__label form__label--required">Usuario</label>
                        <div class="input-group ">
                            <span class="form__icon input-group-text @error ('user') is-invalid--border @enderror" id="basic-addon1"><i class="bi bi-search "></i></span>
                            <input type="text" name="user" class="form-control @error ('user') is-invalid @enderror"
                                placeholder="Yane2024" aria-label="Username"
                                aria-describedby="basic-addon1"
                                autofocus
                                value="{{ old('user') }}">
                        </div>
                        @error('user')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                    
    
                    <div class="form__item">
                        <label for="" class="form__label form__label--required">Contraseña</label>
                        <div class="input-group ">
                            <span class="form__icon input-group-text @error ('password') is-invalid--border @enderror" id="basic-addon1"><i class="bi bi-search "></i></span>
                            <input type="password" name="password" class="form-control @error ('password') is-invalid @enderror"
                                placeholder="*******" aria-label="Username"
                                aria-describedby="basic-addon1"
                                value="">
                        </div>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                    <div class="form__item">
                        <label for="" class="form__label form__label--required">Confirmar contraseña</label>
                        <div class="input-group ">
                            <span class="form__icon input-group-text @error ('password_confirmation') is-invalid--border @enderror" id="basic-addon1"><i class="bi bi-search "></i></span>
                            <input type="password" name="password_confirmation" class="form-control @error ('password_confirmation') is-invalid @enderror "
                                placeholder="*******" aria-label="Username"
                                aria-describedby="basic-addon1"
                                value="">
                        </div>
                        @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
    
                </fieldset>
                <hr>
                <div class="form__button w-100">
                    <button class="button button--color-blue w-100" type="submit">
                        Registrarte
                    </button>
                </div>
            </form>
        </article>
    </main>
    <x-footer></x-footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

<script>
    let $all_avatar_img = document.querySelectorAll(".form__avatar-content > label > img");

    document.addEventListener('click', e => {

        if (e.target.matches(".form__avatar-content > label > img")) {
            for (let i = 0; i < $all_avatar_img.length; i++) {
                $all_avatar_img[i].removeAttribute("data-checked");
                $all_avatar_img[i].classList.remove("checked")
            }
            e.target.classList.add("checked");
            e.target.setAttribute("data-checked", "true");
        }
    })

    document.addEventListener('DOMContentLoaded', e => {
        for (let i = 0; i < $all_avatar_img.length; i++) {
            $all_avatar_img[i].removeAttribute("data-checked");
            $all_avatar_img[i].classList.remove("checked")
        }
        $all_avatar_img[0].classList.add("checked");
        $all_avatar_img[0].setAttribute("data-checked", "true");
    })
</script>

</html>