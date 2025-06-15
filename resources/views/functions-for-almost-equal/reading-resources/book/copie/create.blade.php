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
        <form action="{{ route('copie.book.store', $slug) }}" method="post" class="form form--employee">
            @csrf
            <h1 class="form__title">
                <b> Agregar Autor</b>
            </h1>
            <div class="form__item">
                <label for="" class="form__label form__label--required">Cantidad</label>
                <div class="input-group ">
                    <span class="form__icon input-group-text @error ('amount') is-invalid--border @enderror"
                        id="basic-addon1"><i class="bi bi-search "></i></span>
                    <input type="number" name="amount" class="form-control @error ('amount') is-invalid @enderror"
                        placeholder="Yaneri Perdomo" aria-label="Username" aria-describedby="basic-addon1" autofocus
                        value="{{ old('amount') }}">
                </div>
                @error('amount')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__item">
                <label for="" class="form__label ">Ubicacion</label>
                <div class="input-group ">
                    <span class="form__icon input-group-text @error ('location') is-invalid--border @enderror"
                        id="basic-addon1"><i class="bi bi-search "></i></span>
                          <textarea   id="location" name="location" class="form-control
                            @error ('location') is-invalid @enderror " placeholder="+584739997"
                            aria-label="Username" aria-describedby="basic-addon1" autofocus
                            value="{{ old('location')}}">

                            </textarea>
                </div>
                @error('location')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__item">
                <label for="" class="form__label form__label--required">Fecha de adquisición</label>
                <div class="input-group ">
                    <span class="form__icon input-group-text @error ('acquisition_date') is-invalid--border @enderror"
                        id="basic-addon1"><i class="bi bi-search "></i></span>
                    <input type="date" name="acquisition_date"
                        class="form-control @error ('acquisition_date') is-invalid @enderror"
                        placeholder="Yaneri Perdomo" aria-label="Username" aria-describedby="basic-addon1" autofocus
                        value="{{ old('acquisition_date') }}">
                </div>
                @error('acquisition_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form__item">
                <label for="" class="form__label form__label--required">Estado</label>
                <div class="input-group w-100">
                    <span
                        class="w-100 form__icon input-group-text p-0 @error ('type_state_id') is-invalid--border @enderror"
                        id="basic-addon1">
                        <div class="input-group ">
                            <span
                                class="form__icon input-group-text @error ('acquisition_date') is-invalid--border @enderror"
                                id="basic-addon1"><i class="bi bi-search "></i></span>
                            <select id="type-indicator" name="type_state_id" class="form-control form__select " required>
                                <option value="" selected disabled>Seleccione una opción</option>
                                @foreach ($types_state as $value)
                                    @if ($value->type_state != 'Prestado')
                                        <option value="{{ $value->type_state_id }}"> {{ $value->type_state }} </option>                                        
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </span>

                </div>
                @error('type_state_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <hr class="form__line">
            <div class="form__button w-100">
                <button class="button button--color-blue w-100" type="submit">
                    Crear cargo
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