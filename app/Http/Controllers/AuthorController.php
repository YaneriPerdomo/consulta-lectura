<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Auth;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::paginate(10);
        return view('functions-for-almost-equal.resource-data.author.show-all', ['authors' => $authors]);
    }

    public function create()
    {
        return view('functions-for-almost-equal.resource-data.author.create');
    }

    public function store(Request $request)
    {

        $slug = converter_slug($request->author);
        Author::create(
            [
                'author' => $request->author,
                'gender_id' => $request->gender_id,
                'slug' => $slug
            ]
        );

        $message = $request->gender_id == 1 ? 'La autora ha sido registrada correctamente' : 'El autor ha sido registrado correctamente';
        return redirect('datos-de-recursos-de-lectura/autores')
            ->with('alert-success', $message);
    }

    public function edit($slug)
    {
        $author = Author::where('slug', $slug)->first();

        return view('functions-for-almost-equal.resource-data.author.edit', ['data_author' => $author]);
    }

    public function update(Request $request, $slug)
    {
        $author = Author::where('slug', $slug)->first();
        $slug = converter_slug($request->author);
        $author->update([
            'author' => $request->author,
            'gender_id' => $request->gender_id,
            'slug' => $slug
        ]);

        $message = $request->gender_id == 1 ? 'La autora ha sido registrada correctamente' : 'El autor ha sido registrado correctamente';
        return redirect('datos-de-recursos-de-lectura/autor/' . $slug . '/editar')
            ->with('alert-success', $message);

    }

}
