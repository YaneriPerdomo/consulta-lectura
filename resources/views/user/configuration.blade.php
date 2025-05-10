<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configuration | Biblioteca B</title>
    <link rel="stylesheet" href="../css/utilities.css">
    <link rel="stylesheet" href="../css/layouts/_base.css">
    <link rel="stylesheet" href="../css/components/_button.css">
    <link rel="stylesheet" href="../css/components/_footer.css">
    <link rel="stylesheet" href="../css/components/_form.css">
    <link rel="stylesheet" href="../css/components/_header.css">
    <link rel="stylesheet" href="../css/components/_input.css">
    <link rel="stylesheet" href="../css/components/_top-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body class="h-100 d-flex flex-column">
    <x-top-bar></x-top-bar>
    <x-header></x-header>
    <main class="flex__grow-2">
        <article class="container-xxl h-100 ">
            <div class="px-3 mt-3">
                <h1><b>Mi cuenta</b></h1>
            <p>
                Administra tu perfil
            </p>
            </div>
            <form action="{{ route('configuration.update') }}" class="form" method="post">
                @csrf

                @method('PUT')

                @if (session('alert-success-update-data'))
                    <div class="alert alert-success">
                        {{ session('alert-success-update-data') }}
                    </div>
                @endif
                
                <legend><b>Datos</b></legend>
                <span><b>Actualiza tu información personal</b></span>
                <div class="form__item">
                    <label for="" class="form__label form__label--required">Nombre y nombre</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text" id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="text" name="name_lastname" class="form-control "
                            placeholder="Yane Perdomo" aria-label="Username"
                            aria-describedby="basic-addon1"
                            value="{{ $data_person->name}} {{ $data_person->lastname }}">
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
                                <select id="type-indicator" name="identity_card_id" class="form-control form__select " >
                                    <option value="" disabled>Seleccione una opción</option>
                                    @if ($data_person)
                                        <option value="1" @if($data_person->identity_card_id == 1) selected @endif> Venezolano cedulado (V) </option>
                                        <option value="2" @if($data_person->identity_card_id == 2) selected @endif> Extranjero cedulado (E)</option>
                                        <option value="3" @if($data_person->identity_card_id == 3) selected @endif> Pasaporte</option>
                                    @else
                                        <option value=""> No se encontraron datos de persona </option>
                                    @endif
                                </select>
                            </div>
                        </span>
                        <input type="text" name="cedula" class="form-control @error ('cedula') is-invalid @enderror  "
                            placeholder="87654321" aria-label="Username"
                            aria-describedby="basic-addon1"
                            autofocus
                            value="{{ $data_person->cedula }}">
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
                            value="{{ $data_user->email}}">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__item">
                    <label for="gender_id" class="form__label form__label--required">Genero</label>
                    <div class="input-group w-100">
                        <span class="form__icon input-group-text p-0 w-100" id="basic-addon1">
                            <div class="input-group">
                                <select id="gender_id" name="gender_id" class="form-control form__select " required>
                                     <option value="" disabled>Seleccione una opción</option>
                                    @if ($data_person)
                                        <option value="1" @if($data_person->gender_id == "1") selected @endif> F </option>
                                        <option value="2" @if($data_person->gender_id == "2") selected @endif> M</option>
                                    @else
                                        <option value=""> No se encontraron datos de persona </option>
                                    @endif
                                </select>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="form__item">
                    <label for="number" class="form__label ">Numero</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text  @error ('number') is-invalid--border @enderror" id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="text" 
                            id="number" 
                            name="number" 
                            class="form-control 
                            @error ('number') is-invalid @enderror "
                            placeholder="+584739997" aria-label="Username"
                            aria-describedby="basic-addon1"
                            autofocus
                            value="{{ $data_person->number}}">
                    </div>
                    @error('number')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <span><b>Actualiza tu información de usuario</b></span>
                <div class="form__avatar">
                    <label for="" class="form__label">Selecciona un avatar</label>
                    <p class="d-flex gap-2 form__avatar-content flex-wrap">
                        <label for="1" data-checked="true">
                            <input type="radio"class="input-radio--hidden "
                             id="1" name="avatar_id" value="1" @if ($data_person->avatar_id == 1)
                            checked
                            @endif> 
                            <img src="../img/avatares/default.png" alt="" class="form__avatar-img @if ($data_person->avatar_id == 1)
                                    checked
                                @endif "
                            @if ($data_person->avatar_id == 1)
                                data-checked="true"
                            @endif>
                        </label>
                        <label for="2">
                            <input type="radio" id="2" name="avatar_id" @if ($data_person->avatar_id == 2)
                            checked
                        @endif value="2" class="input-radio--hidden">
                            <img 
                                src="../img/avatares/boy.png" 
                                alt="" 
                                class="form__avatar-img 
                                @if ($data_person->avatar_id == 2)
                                    checked
                                @endif "
                                @if ($data_person->avatar_id == 2)
                                    data-checked="true"
                                @endif>
                        </label>
                        <label for="3">
                            <input type="radio" id="3" name="avatar_id" value="3" @if ($data_person->avatar_id == 3)
                            checked
                        @endif class="input-radio--hidden">
                            <img src="../img/avatares/girl.png" alt="" class="form__avatar-img  
                            @if ($data_person->avatar_id == 3)
                                    checked
                                @endif "
                            @if ($data_person->avatar_id == 3)
                                data-checked="true"
                            @endif
                            >
                        </label>
                        <label for="4">
                            <input type="radio" id="4" name="avatar_id"@if ($data_person->avatar_id == 4)
                            checked
                        @endif value="4" class="input-radio--hidden" >
                            <img src="../img/avatares/dinosaur.png" alt="" class="form__avatar-img @if ($data_person->avatar_id == 4)
                                    checked
                                @endif "
                            @if ($data_person->avatar_id == 4)
                                data-checked="true"
                            @endif>
                        </label>
                        <label for="5">
                            <input type="radio" id="5" name="avatar_id"@if ($data_person->avatar_id == 5)
                            checked
                        @endif value="5" class="input-radio--hidden">
                            <img src="../img/avatares/young-snow-m.png" alt="" class="form__avatar-img @if ($data_person->avatar_id == 5)
                                    checked
                                @endif "
                            @if ($data_person->avatar_id == 5)
                                data-checked="true"
                            @endif>
                        </label>
                        <label for="6">
                            <input type="radio" id="6" name="avatar_id" @if ($data_person->avatar_id == 6)
                            checked
                        @endif value="6" class="input-radio--hidden">
                            <img src="../img/avatares/young-snow-f.png" alt="" class="form__avatar-img @if ($data_person->avatar_id == 6)
                                    checked
                                @endif "
                            @if ($data_person->avatar_id == 6)
                                data-checked="true"
                            @endif>
                        </label>
                    </p>
                </div>
                <div class="form__item">
                    <label for="" class="form__label form__label--required">Usuario</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text  @error ('user') is-invalid--border @enderror" id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="search" name="user" class="form-control @error ('user') is-invalid @enderror "
                            placeholder="Yane3" aria-label="Username"
                            aria-describedby="basic-addon1"
                            autofocus
                            value="{{ $data_user->user}}">
                    </div>
                    @error('user')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__button flex-full__justify-content-end ">
                    <button class="button button--color-blue" type="submit">
                        Guardar cambios
                    </button>
                </div>                
            </form>

            <div class="delete-account form">
                <legend class="delete-account__title"><b>Eliminar cuenta</b></legend>
                <small class="delete-account__message text-grey">Elimina permanentemente tu cuenta y todos tus datos.</small>
                <p class="delete-account__important-message ">
                    Una vez que elimines tu cuenta, no hay vuelta atrás. Por favor, asegúrate de estar seguro.
                </p>
                    <button class="delete-account__button button button--color-red" type="submit">
                        <a href="{{ route('delete-account.index') }}" class="text-decoration-none text-white delete-account__link">
                            Eliminar mi cuenta
                        </a>
                    </button>
                         
                </div>
                <form action="{{ route('configuration.password') }}" class="form" method="post">
                    
                    @csrf

                    @method('PUT')
                    @if (session('alert-success-update-password'))
                    <div class="alert alert-success">
                        {{ session('alert-success-update-password') }}
                    </div>
                    @endif
                    <legend><b>Seguridad</b></legend>
                    <span>Actualiza tu contraseña</span>
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
    
                   
                    <div class="form__button flex-full__justify-content-end ">
                        <button class="button button--color-blue" type="submit">
                            Guardar cambios
                        </button>
                    </div>                
                </form>


        </article>
    </main>
    <x-footer></x-footer>

    <script>
        let $all_avatar_img = document.querySelectorAll(".form__avatar-content > label > img");
    
        document.addEventListener('click', e => {
    
            if (e.target.matches(".form__avatar-content > label > img")) {
                for (let i = 0; i < $all_avatar_img.length; i++) {
                    $all_avatar_img[i].removeAttribute("data-checked");
                    $all_avatar_img[i].classList.remove("checked")
                    $all_avatar_img[i].removeAttribute('checked');
                }

                e.target.classList.add("checked");
                e.target.setAttribute("data-checked", "true");
                for(i=0; i < 6;i++){
                if($all_avatar_img[i].getAttribute('data-checked')){
                    $all_avatar_input.setAttribute('checked')
                }
            }
            }
        })
        
        let $all_avatar_input = document.querySelectorAll('[type="radio"]');
        document.addEventListener('DOMContentLoaded', e =>{
            for(i=0; i < 6;i++){
                if($all_avatar_img[i].getAttribute('data-checked')){
                    $all_avatar_input.setAttribute('checked')
                }
            }
        })
         
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>