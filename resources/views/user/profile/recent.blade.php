<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configuration | Biblioteca B</title>
    <link rel="stylesheet" href="../css/utilities.css">
    <link rel="stylesheet" href="../css/layouts/_base.css">
    <link rel="stylesheet" href="../css/pages/_profile.css">
    <link rel="stylesheet" href="../css/components/_button.css">
    <link rel="stylesheet" href="../css/components/_footer.css">
    <link rel="stylesheet" href="../css/components/_form.css">
    <link rel="stylesheet" href="../css/components/_header.css">
    <link rel="stylesheet" href="../css/components/_input.css">
    <link rel="stylesheet" href="../css/components/_top-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body class="h-100 d-flex flex-column">
    <x-top-bar></x-top-bar>
    <x-header></x-header>
    <main class="flex__grow-2">
        <section class="profile  container-xxl">
            <div class="profile__cover-photo 
               {{Auth::user()->person->gender_id == 2 ? 'profile__cover-photo--bg-blue' : 'profile__cover-photo--bg-pink'}} ">
                    <img src="../img/avatares/{{Auth::user()->person->avatar->img}}.png" alt=""
                        class="img-fluid profile__img">
            </div>
            <div class=" flex-full__justify-content-between p-0">
                <div class="profile__name-lastname">
                    <h1 >
                        <strong>
                            {{Auth::user()->person->name}} {{Auth::user()->person->lastname}}
                        </strong>
                    </h1>
                </div>
                <div class="profile__button-update">
                    <a href="{{ route('configuration.index') }}">
                        <button class="button button--no-background text-blue">
                            Editar Perfil
                        </button>
                    </a>
                </div>
            </div>
            <div class="profile__date-activities">
                <div class="">
                    <dl class="profile__terms-conditions">
                        <dt class="profile__terms-conditions--term">Desde:</dt>
                        <dd class="profile__terms-conditions--conditions">
                            <time datetime="{{ $hour_created_at }}." class="profile__time">
                                {{ substr(Auth::user()->created_at, 0, 10)  }}, {{ $hour_created_at }}.
                            </time>
                        </dd>
                        <dt  class="profile__terms-conditions--term">Última actualización:</dt>
                        <dd class="profile__terms-conditions--conditions"> 
                            <time datetime="" class="profile__time">
                                {{ substr(Auth::user()->updated_at, 0, 10)  }}, {{ $hour_updated_at }}.
                            </time>
                        </dd>
                    </dl>
                </div>
            </div>
            
            <div class="d-flex gap-3">
                <div>
                    <i>
                        Valoraciones
                    </i>
                    <br>
                    <div class="text-center">
                        <b>
                            0
                        </b>
                    </div>
                </div>
                <div>
                    <i>
                        Favoritos
                    </i>
                    <br>
                    <div class="text-center">
                        <b>
                            0
                        </b>
                    </div>
                </div>
            </div>
            <hr class="profile__line">
            <x-profile-view-selection selected="Recientes"></x-profile-view-selection>
            <div class="profile__show-data">
                <div class="message">
                    <span>
                        No hay elementos disponibles.
                    </span>
                </div>
            </div>
        </section>
    </main>
    <x-footer></x-footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>