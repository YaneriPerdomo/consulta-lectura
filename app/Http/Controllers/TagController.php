<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {

        $tags = Tag::paginate(10);
        return view('functions-for-almost-equal.resource-data.tag.show-all', ['tags' => $tags]);
    }

    public function create()
    {
        return view('functions-for-almost-equal.resource-data.tag.create');
    }

    public function store(Request $request)
    {

        $slug = converter_slug($request->tag);

        $tag = new Tag();

        $tag->slug = $slug;
        $tag->tag = $request->tag;
        $tag->save();


        //Lanzar una solicitud Get, o más bien una redirección, y al mismo tiempo enviar una variable de sesión Flash
        // temporalmente para mostrar
        // un mensaje al usuario (employee_role) de que su registro se guardó correctamente.
        return redirect('datos-de-recursos-de-lectura/etiquetas')
            ->with('alert-success', 'La etiqueta ha sido registrada exitosamente');
    }

    public function edit($slug)
    {
        $data_tag = Tag::where('slug', $slug)->first();

        return view('functions-for-almost-equal.resource-data.tag.edit', ['data_tag' => $data_tag]);
    }

    public function update(Request $request, $slug_url)
    {
        $tag = Tag::where('slug', $slug_url)->first();
        $slug_update = converter_slug($request->tag);

        $tag->tag = $request->tag;
        $tag->slug = $slug_update;

        $tag->save();


        return redirect('datos-de-recursos-de-lectura/etiqueta/' . $slug_update . '/editar')
            ->with('alert-success', 'La etiqueta ha sido actualizada exitosamente');

    }

}
