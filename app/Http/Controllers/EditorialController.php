<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function index()
    {

        $editorials = Editorial::paginate(10);
        return view('functions-for-almost-equal.resource-data.editorial.show-all', ['editorials' => $editorials]);
    }

    public function create()
    {
        return view('functions-for-almost-equal.resource-data.editorial.create');
    }

    public function store(Request $request)
    {

        $slug = converter_slug($request->editorial);
        $editorial = Editorial::create([
            'editorial' => $request->editorial,
            'slug' => $slug
        ]);

        //Lanzar una solicitud Get, o más bien una redirección, y al mismo tiempo enviar una variable de sesión Flash
        // temporalmente para mostrar
        // un mensaje al usuario (employee_role) de que su registro se guardó correctamente.
        return redirect('datos-de-recursos-de-lectura/editoriales')
            ->with('alert-success', 'La editorial ha sido registrada exitosamente');
    }

    public function edit($slug)
    {
        $data_editorial = Editorial::where('slug', $slug)->first();

        return view('functions-for-almost-equal.resource-data.editorial.edit', ['data_editorial' => $data_editorial]);
    }

    public function update(Request $request, $slug)
    {
        $editorial = Editorial::where('slug', $slug)->first();
        $slug = converter_slug($request->editorial);
        $editorial->update([
            'editorial' => $request->editorial,
            'slug' => $slug
        ]);

         return redirect('datos-de-recursos-de-lectura/editorial/' . $slug . '/editar')
            ->with('alert-success', 'La editorial ha sido actualizada exitosamente');

    }
}
