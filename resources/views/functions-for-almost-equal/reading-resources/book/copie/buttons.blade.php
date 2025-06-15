<!doctype html>
<html lang="es" class="height-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configuration | Biblioteca B</title>
    <link rel="stylesheet" href="../../../css/utilities.css">
    <link rel="stylesheet" href="../../../css/layouts/_base.css">
    <link rel="stylesheet" href="../../../css/components/_button.css">
    <link rel="stylesheet" href="../../../css/components/_footer.css">
    <link rel="stylesheet" href="../../../css/components/_form.css">
    <link rel="stylesheet" href="../../../css/components/_table.css">
    <link rel="stylesheet" href="../../../css/components/_header.css">
    <link rel="stylesheet" href="../../../css/components/_input.css">
    <link rel="stylesheet" href="../../../css/components/_top-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<style>
    .copie__count {
        display: block;
        text-align: center;
    }
</style>

<body class="h-100 d-flex flex-column">
    <x-top-bar relativePath="../../../"></x-top-bar>
    <x-header-auth></x-header-auth>
    <main class="flex__grow-2 flex-full__justify-content-center">
        <div class="flex__grow-2 flex-full__justify-content-center">
            <article class="form  w-adjustable align-self-start">
                <div class="flex-full__justify-aligh-start ">
                    <div>
                        <a href="{{ route('copie.book.create', $slug) }}">
                            <button class="button button--color-blue">
                                Agregar mas copias
                            </button>
                        </a>
                        <hr>
                    </div>
                </div>
                <div class="flex-full__justify-content-between p-0">
                    <div> <a href="{{ route('copie.book.borrowed-copies', $slug) }}">
                            <button class="button button--color-blue">
                                Copias para Préstamo
                            </button>
                        </a>
                        <hr>
                        <small class="copie__count">
                            @if ($not_loaned <= 1)
                                Disponible
                            @else
                                Disponibles
                            @endif :
                            {{ $not_loaned }}

                        </small>
                    </div>
                    <div>
                        <a href="">
                            <button class="button button--color-orange">
                                Procesar Devolución
                            </button>
                        </a>
                        <hr>
                        <small class="copie__count">
                            @if ($loane <= 1)
                                Prestado
                            @else
                                Prestados
                            @endif : {{ $loane }}

                        </small>
                    </div>
                    <div>
                        <a href="">
                            <button class="button button--color-orange">
                                Copias en reparación
                            </button>
                        </a>
                        <hr>
                        <small class="copie__count">
                            @if ($under_repair <= 1)
                                Pendiente
                            @else
                                Pendientes
                            @endif : {{ $under_repair }}

                        </small>
                    </div>
                
                </div>
                <hr>
                <div class="flex-full__justify-aligh-start ">
                     <div>
                        <a href="">
                            <button class="button button--color-orange">
                                Copias perdidas o dañadas
                            </button>
                        </a>
                        <hr>
                        <small class="copie__count">
                            @if ($lost_or_damaged <= 1)
                                Número actual
                            @else
                                Números actuales
                            @endif : {{ $lost_or_damaged }}

                        </small>
                    </div>
                </div>
            </article>
        </div>
    </main>


    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>