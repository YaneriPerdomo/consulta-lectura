<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::paginate(7);
        return view("admin.human-resources.room.show-all", ['rooms' => $rooms]);
    }

    public function create()
    {
        return view('admin.human-resources.room.create');
    }

    public function store(Request $request)
    {
        
        $slug = converter_slug($request->room);

        $room = Room::create(
            [
                'room' => $request->room,
                'description' => $request->description,
                'slug' => $slug,
            ]
        );

        $request->session()->flash(
            'alert-success',
            'La sala ha sido registrada exitosamente.'
        );

        return redirect('recursos-humanos/sala');
    }

    public function edit($slug_url)
    {
        $data_room = Room::where('slug', $slug_url)->first();
        return view('admin.human-resources.room.edit', ['data_room' => $data_room]);
    }

    public function update(Request $request, $slug_url)
    {
        $slug_update = converter_slug($request->room);
        $room = Room::where('slug', $slug_url)->first();
        $room->room = $request->room;
        $room->description = $request->description;
        $room->slug = $slug_update;
        $room->save();

        $request->session()->flash(
            'alert-success',
            'La sala ha sido acutalizado exitosamente.'
        );

        return redirect('recursos-humanos/sala/' . $slug_update . '/editar');
    }

    public function showDeleteAccount($slug_url = '')
    {

        return view('admin.human-resources.room.delete', ['slug_url'=> $slug_url]);
    }

}
