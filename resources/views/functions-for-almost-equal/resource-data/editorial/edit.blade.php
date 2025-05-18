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
    <link rel="stylesheet" href="../../../css/components/_header.css">
    <link rel="stylesheet" href="../../../css/components/_input.css">
    <link rel="stylesheet" href="../../../css/components/_top-bar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body class="h-100 d-flex flex-column">
    <x-top-bar relativePath="../"></x-top-bar>
    <x-header-auth></x-header-auth>
    <main class="flex__grow-2 flex-full__aligh-start">
        <form action="{{ route('employee.editorial.update', $data_editorial->slug) }}" method="post" class="form form--employee">
            @csrf

            @method('PUT')
            <h1 class="form__title">
                <b> Actualizar editorial</b>
            </h1>
                 
            @if (session('alert-success'))
                <div class="alert alert-success">
                    {{ session('alert-success') }}
                </div>
            @endif 
            <div class="form__item">
                <label for="" class="form__label form__label--required">Cargo</label>
                <div class="input-group ">
                    <span class="form__icon input-group-text @error ('editorial') is-invalid--border @enderror"
                        id="basic-addon1"><i class="bi bi-search "></i></span>
                    <input type="text" name="editorial" class="form-control @error ('editorial') is-invalid @enderror"
                        placeholder="Yaneri Perdomo" aria-label="Username" aria-describedby="basic-addon1" autofocus
                        value="{{ $data_editorial->editorial }}">
                </div>
                @error('editorial')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <hr class="form__line">
            <div class="form__button w-100">
                <button class="button button--color-blue w-100" type="submit">
                    Actualizar editorial
                </button>
            </div>
        </form>
    </main>


    <x-footer></x-footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>
</body>

</html>