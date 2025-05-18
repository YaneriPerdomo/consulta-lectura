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
        <main class="flex__grow-2 ">
            <div class="row m-0">
                <div class="col-3 p-0">
                    <section class="form">
                        <span class="text-black "><b>Historial</b></span>
                    </section>
                </div>
                <div class="col-9 p-0">
                    <article class="form">
                        <div class="flex-full__justify-content-between p-0">
                            <div>
                                <h1><b>Usuarios</b></h1>
                            </div>
                 
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
                                            <th>Usuario</th>
                                            <th>Nombre y apellido</th>
                                            <th>Tipo de identidad</th>
                                            <th>Cedula</th>
                                            <th>Correo electronico</th>
                                            <th>Operaciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @if ($users->items() == [])
                                            <p>No hay usuarios registrados por los momentos.</p>
                                        @else
                                            @foreach ($users->items() as $value)
                                                <tr class='show'>
                                                    <td>{{ $value->user }}</td>
                                                    <td>{{ $value->person->name ?? '' }} {{ $value->person->lastname ?? ''}}
                                                    </td>
                                                    <td>@switch($value->person->identity_card_id)
                                                        @case(1)
                                                            @if ($value->person->gender_id == 1)
                                                                Venezolana Cedulada
                                                            @else
                                                                Venezolano Cedulado
                                                            @endif
                                                        @break
                                                        @case(2)
                                                            @if ($value->person->gender_id == 1)
                                                                Extranjera cedulada
                                                            @else
                                                                Extranjero cedulado
                                                            @endif
                                                        @break
                                                        @case(3)
                                                            Pasaporte
                                                        @break
                                                    
                                                        @default
                                                            
                                                    @endswitch
                                                    </td>
                                                    <td>{{ $value->person->cedula ?? 'Sin cedula' }}</td>

                                                    <td>{{ $value->email?? 'No tiene departamento asignado' }}
                                                    </td>

                                                    <td class='operations'>
                                                        <a href="{{ route('admin.user.delete', $value->person->slug) }}">
                                                            <button class='button button--color-red'>
                                                                <i class='bi bi-trash'></i>
                                                            </button>
                                                        </a>
                                                        <a href='{{ route('admin.user.edit', $value->person->slug) }}'>
                                                            <button class="button button--color-orange">
                                                                <i class='bi bi-person-lines-fill'></i>
                                                            </button>
                                                        </a>
                                                        <a href='{{ route('admin.user.history', $value->user) }}'>
                                                            <button class="button button--color-black">
                                                                <i class="bi bi-journal-text"></i>
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
                                        @if (!$users->items() == [])
                                            Mostrando {{ $users->count() == 1 ? 'registro' : 'registros' }} 1 -
                                            {{ $users->count() }}
                                            de un total de {{ $users->total() }}
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    {{ $users->links() }}
                                </div>
                            </div>

                        </div>
                    </article>
                </div>
            </div>
        </main>


        <x-footer></x-footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
            crossorigin="anonymous"></script>
</body>

</html>