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
    <style>
        .hidden {
            display: none !important;
        }
    </style>
    </head>

<body class="h-100 d-flex flex-column">
    <x-top-bar relativePath="../"></x-top-bar>
    <x-header-auth></x-header-auth>
    <main class="flex__grow-2 flex-full__aligh-start">
        <form action="{{ route('copie.book.update', $slug) }}" method="post" class="form form--employee">
            @csrf

            @method('PUT')
            <h1 class="form__title">
                <b> Agregar Autor</b>
            </h1>
          
            <div class="form__item">
                <label for="" class="form__label ">Ubicacion</label>
                <div class="input-group ">
                    <span class="form__icon input-group-text @error ('location') is-invalid--border @enderror"
                        id="basic-addon1"><i class="bi bi-search "></i></span>
                        <textarea  
                            id="location" 
                            name="location" 
                            class="form-control @error ('location') is-invalid @enderror " 
                            placeholder="+584739997"
                            aria-label="Username" 
                            aria-describedby="basic-addon1" 
                            autofocus >
                            {{ trim($copie->location) ?? 'nada'}}
                        </textarea>
                </div>
                @error('location')
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
                            <select id="type_state_id" name="type_state_id" class="form-control form__select " required>
                                <option value="" disabled>Seleccione una opción</option>
                                 @foreach ($types_state as $value)
                                    @if ($value->type_state != 'Prestado')
                                        <option value="{{ $value->type_state_id }}"
                                            
                                             @if ($value->type_state_id == $copie->type_state_id)
                                                 selected
                                             @endif
                                            > {{ $value->type_state }} </option>                                        
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
             <div class="form__item form__item--notes">
                <label for="" class="form__label ">Observaciones</label>
                <div class="input-group ">
                    <span class="form__icon input-group-text @error ('notes') is-invalid--border @enderror"
                        id="basic-addon1"><i class="bi bi-search "></i></span>
                        <textarea  
                            id="notes" 
                            name="notes" 
                            class="form-control @error ('notes') is-invalid @enderror " 
                            placeholder="+584739997"
                            aria-label="Username" 
                            aria-describedby="basic-addon1" 
                            autofocus >
                            {{ trim($copie->notes) ?? 'nada'}}
                        </textarea>
                </div>
                @error('notes')
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

<script>

    const SELECT_TYPE_STATE = document.querySelector('#type_state_id');
    const FORM_ITEM_NOTES = document.querySelector('.form__item--notes');
 
    function toggle_element_visibility(selected_value, trigger_value, element) {
        if (selected_value == trigger_value) {
            element.classList.remove('hidden');  
        } else {
            element.classList.add('hidden');    
        }
    }

    SELECT_TYPE_STATE.addEventListener('change', e => {
        toggle_element_visibility(e.target.value, 3, FORM_ITEM_NOTES);
    });

</script>
</html>