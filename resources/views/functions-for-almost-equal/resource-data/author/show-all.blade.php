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
    <link rel="stylesheet" href="../css/components/_table.css">
    <link rel="stylesheet" href="../css/components/_header.css">
    <link rel="stylesheet" href="../css/components/_input.css">
    <link rel="stylesheet" href="../css/components/_top-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body class="h-100 d-flex flex-column">
    <x-top-bar relativePath="../"></x-top-bar>
    <x-header-auth></x-header-auth>
    <main class="flex__grow-2 flex-full__justify-content-center">
        <article class="form  w-adjustable align-self-start">
            <div class="flex-full__justify-content-between p-0">
                <div>
                    <h1><b>Autor/a</b></h1>
                </div>
                @if (Auth::check() && Auth::user()->role_id == 3)
                    <div>
                    <a href="{{ route('employee.author.create') }}">
                        <button class="button button--color-blue">
                            Agregar Autor
                        </button>
                    </a>
                </div>
                @endif
            </div>
            <div class="">
                <hr>
                @if (session('alert-success'))
                    <div class="alert alert-success">
                        {{ session('alert-success') }}
                    </div>
                @endif
                <section class='table'>
                    <table class='dataTable'>
                        <thead>
                            <tr>
                                <th>Autor/a</th>
                                <th>Genero</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($authors->items() == [])
                                <p>No hay cargos registrados por los momentos.</p>
                            @else
                                @foreach ($authors->items() as $value)
                                    <tr class='show'>
                                        <td>{{ $value->author }}</td>
                                        </td>
                                        <td>{{ $value->gender_id == 1 ? 'F' : 'M' }}</td>
                                        </td>
                                        <td class='operations'>
                                            <a href="{{ route('employee.author.delete', $value->slug) }}">
                                                <button type="button" class="button button--color-red js-detele-account">
                                                    <i class='bi bi-trash''></i>

                                                            </button></a>
                                                            <a href=' {{ route('employee.author.edit', $value->slug ?? null) }}'>
                                                        <button class="button button--color-orange">
                                                            <i class='bi bi-person-lines-fill'></i>
                                                        </button>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </section>
                <div>

                </div>
                <div class="flex-full__justify-content-between">
                    <div>
                        <p>
                            Mostrando {{ $authors->count() == 1 ? 'registro' : 'registros' }} 1 - {{ $authors->count() }}
                            de un total de {{ $authors->total() }}
                        </p>
                    </div>
                    <div>
                        {{ $authors->links() }}
                    </div>
                </div>

            </div>
        </article>
    </main>


    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>