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
            <form action="{{ route('admin.room.update', $data_room->slug) }}" method="post" class="form form--employee">
                @csrf

                @method('PUT')
                <h1 class="form__title">
                    <b> Actualizar sala</b>
                </h1>
                  @if (session('alert-success'))
                <div class="alert alert-success">
                    {{ session('alert-success') }}
                </div>
            @endif
               
                <div class="form__item">
                    <label for="" class="form__label form__label--required">Cargo</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text @error ('room') is-invalid--border @enderror"
                            id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="text" name="room" class="form-control @error ('room') is-invalid @enderror"
                            placeholder="Yaneri Perdomo" aria-label="Username" aria-describedby="basic-addon1" autofocus
                            value="{{  $data_room->room  }}">
                    </div>
                    @error('room')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__item">
                    <label for="" class="form__label form__label--required">Descripcion</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text @error ('description') is-invalid--border @enderror"
                            id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="text" name="description"
                            class="form-control @error ('description') is-invalid @enderror"
                            placeholder="Yaneri Perdomo" aria-label="Username" aria-describedby="basic-addon1" autofocus
                            value="{{ $data_room->description ?? '' }}">
                    </div>
                    @error('description')
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

<script>
   
       /*
        const nuevoSlug = document.querySelector('.friendly_url').textContent.trim(); // Obtén el texto del h1 y elimina espacios alrededor
        console.info("Nuevo Slug:", nuevoSlug);

        const urlActual = window.location.href;
        const partesUrl = urlActual.split('/');
        const indiceSlug = partesUrl.indexOf('editar') - 1; // El segmento antes de 'editar' suele ser el slug

        if (indiceSlug > 0 && partesUrl[indiceSlug]) {
            const nuevaURL = partesUrl.slice(0, indiceSlug).join('/') + '/' + nuevoSlug + '/' + partesUrl.slice(indiceSlug + 1).join('/');
            const nuevoTitulo = nuevoSlug; // Usa el nuevo slug como título (puedes ajustarlo)

            history.pushState({ page: 4 }, nuevoTitulo, nuevaURL);
            document.title = nuevoTitulo; // Actualiza el título de la página
            console.log("Nueva URL:", nuevaURL);
        } else {
            console.error("No se pudo determinar la posición del slug en la URL.");
        }
        * /
   
</script>