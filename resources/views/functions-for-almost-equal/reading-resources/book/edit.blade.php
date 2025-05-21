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
        <form action="{{ route('book.update', $book->slug) }}" method="post" class="form form--employee">
            @csrf

            @method('PUT')
            <h1 class="form__title">
                <b> Agregar Libro</b>
            </h1>
               @if (session('alert-success'))
                <div class="alert alert-success">
                    {{ session('alert-success') }}
                </div>
            @endif 
            <div class=
            <fieldset class="form__grouped-fields form__data--employee">
                <legend class="form__subtitle"><b>Datos en la portada y lomo</b></legend>
                <div class="form__item">
                    <label for="" class="form__label form__label--required">Titulo</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text @error ('title') is-invalid--border @enderror"
                            id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="text" name="title" class="form-control @error ('title') is-invalid @enderror"
                            placeholder="" aria-label="Username" aria-describedby="basic-addon1" autofocus
                            value="{{ $book->title }}">
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__item">
                    <label for="" class="form__label">Subtitulo</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text @error ('title') is-invalid--border @enderror"
                            id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="text" name="sub_title" class="form-control @error ('sub_title') is-invalid @enderror"
                            placeholder="Yaneri Perdomo" aria-label="Username" aria-describedby="basic-addon1" autofocus
                            value="{{ $book->sub_title }}">
                    </div>
                    @error('sub_title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__item">
                    <label for="" class="form__label">Idioma</label>
                    <div class="input-group w-100">
                        <span
                            class="w-100 form__icon input-group-text p-0 @error ('languages') is-invalid--border @enderror"
                            id="basic-addon1">
                            <div class="input-group ">
                                <select id="language_id" name="language_id" class="form-control form__select " required>
                                    <option value="" selected disabled>Seleccione una opción</option>
                                    @foreach ($languages as $value)
                                        <option value="{{ $value->language_id }}"
                                            @if ($value->language_id == $book->language_id)
                                                selected
                                            @endif
                                            > {{ $value->language}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </span>

                    </div>
                    @error('language_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__item">
                    <label for="" class="form__label form__label--required">Autor</label>
                    <div class="input-group w-100">
                        <span
                            class="w-100 form__icon input-group-text p-0 @error ('author_id') is-invalid--border @enderror"
                            id="basic-addon1">
                            <div class="input-group ">
                                <select id="type-indicator" name="author_id" class="form-control form__select " required>
                                    <option value="" selected disabled>Seleccione una opción</option>
                                    @foreach ($authors as $value)
                                        <option value="{{ $value->author_id }}"
                                             @if ($value->author_id == $book->author_id)
                                                selected
                                            @endif
                                            > {{ $value->author }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </span>

                    </div>
                    @error('author_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__item">
                    <label for="" class="form__label form__label--required">Editorial</label>
                    <div class="input-group w-100">
                        <span
                            class="w-100 form__icon input-group-text p-0 @error ('editorial_id') is-invalid--border @enderror"
                            id="basic-addon1">
                            <div class="input-group ">
                                <select id="type-indicator" name="editorial_id" class="form-control form__select "
                                    required>
                                    <option value="" selected disabled>Seleccione una opción</option>
                                     @foreach ($editorials as $value)
                                        <option value="{{ $value->editorial_id }}"
                                              @if ($value->editorial_id == $book->editorial_id)
                                                selected
                                            @endif
                                            > {{ $value->editorial }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </span>

                    </div>
                    @error('editorial_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form__item">
                    <label for="" class="form__label form__label--required">Año de publicación</label>
                    <div class="input-group ">
                        <span
                            class="form__icon input-group-text  @error ('publication_date') is-invalid--border @enderror"
                            id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="date" name="publication_date"
                            class="form-control @error ('publication_date') is-invalid @enderror "
                            placeholder="m@example.com" aria-label="Username" aria-describedby="basic-addon1" autofocus
                            value="{{ $book->publication_date}}">
                    </div>
                    @error('publication_date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__item">
                    <label for="number" class="form__label form__label--required ">ISBN</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text  @error ('isbn') is-invalid--border @enderror"
                            id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="number" id="isbn" name="isbn" class="form-control
                            @error ('isbn') is-invalid @enderror " placeholder="+584739997" aria-label="Username"
                            aria-describedby="basic-addon1" autofocus value="{{ $book->ISBN}}">
                    </div>
                    @error('isbn')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form__item">
                    <label for="number" class="form__label ">Portada</label>
                    <div class="input-group ">
                        <span
                            class="form__icon input-group-text  @error ('front_page') is-invalid--border @enderror"
                            id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="file" id="front_page" name="front_page" class="form-control
                            @error ('front_page') is-invalid @enderror " placeholder="+584739997"
                            aria-label="Username" aria-describedby="basic-addon1" autofocus
                            value="{{ $book->front_page}}">
                    </div>
                    @error('front_page')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </fieldset>

            <fieldset class="form__grouped-fields form__data--user">
                <legend class="form__subtitle"><b>Detalles adicionales</b></legend>
                <div class="form__item">
                    <label for="number" class="form__label ">Nombre del traductor</label>
                    <div class="input-group ">
                        <span
                            class="form__icon input-group-text  @error ('translator_name') is-invalid--border @enderror"
                            id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="text" id="translator_name" name="translator_name" class="form-control
                            @error ('translator_name') is-invalid @enderror " placeholder="+584739997"
                            aria-label="Username" aria-describedby="basic-addon1" autofocus
                            value="{{ $book->translator}}">
                    </div>
                    @error('translator_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__item">
                    <label for="number" class="form__label ">Descripcion</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text  @error ('description') is-invalid--border @enderror"
                            id="basic-addon1"><i class="bi bi-search "></i></span>
                            <textarea   id="description" name="description" class="form-control
                            @error ('description') is-invalid @enderror " placeholder="+584739997"
                            aria-label="Username" aria-describedby="basic-addon1" autofocus
                            >{{$book->description}}</textarea>
                        
                    </div>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form__item">
                    <label for="" class="form__label">Numero de pagina</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text @error ('page_number') is-invalid--border @enderror"
                            id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="number" name="page_number"
                            class="form-control @error ('page_number') is-invalid @enderror" placeholder="Yane2024"
                            aria-label="Username" aria-describedby="basic-addon1" autofocus
                            value="{{ $book->page_number }}">
                    </div>
                    @error('page_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                 <div class="form__item">
                    <label for="" class="form__label">Etiquetas</label>
                    <div class="input-group ">
                        <span class="form__icon input-group-text @error ('page_number') is-invalid--border @enderror"
                            id="basic-addon1"><i class="bi bi-search "></i></span>
                        <input type="number" name="_page_number"
                            class="form-control @error ('page_number') is-invalid @enderror" placeholder="Yane2024"
                            aria-label="Username" aria-describedby="basic-addon1" autofocus
                            value="{{ old('page_number') }}">
                    </div>
                    @error('page_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


            </fieldset>

            <hr class="form__line">
            <div class="form__button w-100">
                <button class="button button--color-blue w-100" type="submit">
                    Actualizar cuenta
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