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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        .profile__cover-photo {}

        .profile__cover-photo--color-blue {
            background: var(--color-blue);
        }

        .profile__img {
            width: clamp(250px, 20vw, 269px);
            width: 30vh;
        }
    </style>
</head>

<body class="h-100 d-flex flex-column">
    <x-top-bar></x-top-bar>
    <x-header></x-header>
    <main class="flex__grow-2">
        <section class="profile  container-xxl">
            <div class="profile__cover-photo profile__cover-photo--color-blue">
                <span class="">
                    <img src="../img/avatares/{{Auth::user()->person->avatar->img}}.png" alt=""
                        class="img-fluid profile__img">
                </span>
            </div>
            <div class="flex-full__justify-content-between profile__information p-0">
                <div>
                    <h1>
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

            <div>
                <div>
                    <dl>
                        <dt>Desde:</dt>
                        <dd>
                            
                            <time datetime=", {{ $hour_created_at }}.">
                                {{ substr(Auth::user()->created_at, 0,10)  }}, {{ $hour_created_at }}.
                            </time>
                        </dd>
                        <dt>Última actualización:</dt>
                        <dd> {{ substr(Auth::user()->updated_at, 0, 10)  }}, {{ $hour_updated_at }}.</dd>
                    </dl>
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