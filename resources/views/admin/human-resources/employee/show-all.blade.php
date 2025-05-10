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
    <x-header-admin></x-header>
        <main class="flex__grow-2 ">
            <article class="form">
                <div class="flex-full__justify-content-between p-0">
                    <div>
                        <h1><b>Empleados</b></h1>
                    </div>
                    <div>
                        <a href="{{ route('admin.employee.create-account') }}" class="text-decoration-none text-white">
                            <button class="button button--color-blue">
                                Agregar empleado
                            </button>
                        </a>
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
                                    <th>Cedula</th>
                                    <th>Cargo laboral</th>
                                    <th>Departamento</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>

                            <tbody>

                                @if ($users->items() == [])
                                    <p>No hay empleados registrados por los momentos.</p>
                                @else
                                    @foreach ($users->items() as $value)
                                        <tr class='show'>
                                            <td>{{ $value->user }}</td>
                                            <td>{{ $value->employee->name ?? '' }} {{ $value->employee->lastname ?? ''}}</td>
                                            <td>{{ $value->employee->cedula ?? 'Sin cedula' }}</td>
                                            <td>{{ json_decode($value->employee->job)->job ?? 'No tiene cargo' }}</td>
                                            <td>{{ json_decode($value->employee->room)->room ?? 'No tiene departamento asignado' }}
                                            </td>

                                            <td class='operations'>
                                                <a href="{{ route('admin.employee.delete', $value->user) }}">
                                                    <button class='OpenDeleteChild'>
                                                        <i class='bi bi-trash'></i>
                                                    </button>
                                                </a>
                                                    <a href='{{ route('admin.employee.edit', $value->user) }}'>
                                                <button>
                                                    <i
                                                            class='bi bi-person-lines-fill'></i></button></a>
                                                <a href='child/progress.php?id={{ $value->id }}'><button><i
                                                            class='bi bi-bar-chart'></i></button></a>
                                                <button class='OpenSendNotificationChild'> <i
                                                        class='bi bi-send-plus'></i></button>
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
                                Mostrando {{ $users->count() == 1 ? 'registro':'registros' }} 1 - {{ $users->count() }} de un total de {{ $users->total() }}
                            </p>
                        </div>
                        <div>
                            {{ $users->links() }}
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