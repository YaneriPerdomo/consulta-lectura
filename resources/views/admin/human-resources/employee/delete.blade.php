<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eliminar cuenta | Biblioteca B</title>
    <link rel="stylesheet" href="../../../css/utilities.css">
    <link rel="stylesheet" href="../../../css/layouts/_base.css">
    <link rel="stylesheet" href="../../../css/components/_button.css">
    <link rel="stylesheet" href="../../../css/components/_footer.css">
    <link rel="stylesheet" href="../../../css/components/_form.css">
    <link rel="stylesheet" href="../../../css/components/_header.css">
    <link rel="stylesheet" href="../../../css/components/_card.css">
    <link rel="stylesheet" href="../../../css/components/_input.css">
    <link rel="stylesheet" href="../../../css/components/_top-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>


<body class="h-100 d-flex flex-column">
    <x-top-bar></x-top-bar>
    <x-header-admin relativePath="../"></x-header-admin>
    <main class="flex__grow-2">
        <article class="container-xxl h-100 flex-full__justify-content-center ">
            <div class="card card--delete-account p-3">
                <div>
                    <b class="card__title">
                        <i class="bi bi-exclamation-diamond"></i>
                        Eliminar cuenta
                    </b><br>
                    <span class="card__sub-title">
                        Esta acción es permanente y no se puede deshacer
                    </span>
                    <hr>
                </div>
                <div class="card__message card__message--delete-acount">
                    <i> <u>Advertencia:</u></i><br>
                    <p>
                        Su cuenta se eliminará permanentemente. Se borrarán todos sus datos personales, incluido el
                        historial de recursos físicos solicitados. Sin embargo, si tiene un recurso físico pendiente, no
                        podrá eliminar su cuenta hasta que cambie su estado, como entregarlo o ir a la biblioteca para
                        cambiarlo
                    </p>
                </div>
                <hr>
                <div class="card__button-option flex-full__justify-content-between ">
                    <a href="{{ route('admin.employee.index') }}" class="text-decoration-white card__link-cancel">
                        <button class="button button--color-grey" type="submit">
                            Cancelar
                        </button>
                    </a>
                    <button class="card__button button button--color-red" type="submit">
                        Eliminar permanentemente
                    </button>
                </div>
            </div>
            <hr>
        </article>
    </main>
    <x-footer></x-footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>