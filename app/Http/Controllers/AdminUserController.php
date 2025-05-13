<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmPasswordRequest;
use App\Models\Person;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\DB as FacadesDB;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::where('rol_id', 2)
            ->with('person')
            ->paginate(7);
        return view("admin.user.show-all", compact("users"));
    }

    public function edit($slug_url)
    {
        $data_person = Person::where('slug', $slug_url)->first();
        $data_user = User::where('user_id', $data_person->user_id)->first();
        return view('admin.user.edit', ['data_user' => $data_user, 'data_person' => $data_person]);
    }

    public function update(Request $request, $slug_url)
    {
        try {

            FacadesDB::beginTransaction();

            $name_lastname = explode(' ', $request->name_lastname);

            $slug_update = converter_slug($request->name_lastname, $request->cedula);

            $data_person = Person::where('slug', $slug_url)->first();
            $data_user = User::where('user_id', $data_person->user_id)->first();

            if (
                $data_user->user == $request->user &&
                $data_user->email == $request->email &&
                $data_person->name == $name_lastname[0] &&
                $data_person->lastname == $name_lastname[1] &&
                $data_person->cedula == $request->cedula &&
                $data_person->identity_card_id == $request->identity_card_id &&
                $data_person->avatar_id == $request->avatar_id &&
                $data_person->number == $request->number &&
                $data_person->gender_id == $request->gender_id
            ) {
                return redirect('/empleado/' . $data_user->user . '/editar');
            } else {

                $data_user->update([
                    'user' => $request->user,
                    'email' => $request->email,
                ]);

                $data_person->number = $request->number;
                $data_person->save();

                $data_person->update([
                    'gender_id' => $request->gender_id,
                    'avatar_id' => $request->avatar_id,
                    'identity_card_id' => $request->identity_card_id,
                    'cedula' => $request->cedula,
                    'name' => $name_lastname[0],
                    'lastname' => $name_lastname[1],
                    'number' => $request->number,
                    'slug' => $slug_update
                ]);

                FacadesDB::commit();

                $request->session()->flash('alert-success-update-data', 'Los datos personales se han actualizado.');

              
                return redirect('usuario/' . $slug_update . '/editar');
            }

        } catch (\Exception $ex) {
            FacadesDB::rollBack();
            throw $ex;
        }
    }

    public function showDeleteAccount($slug)
    {
        return view('admin.user.delete', ['name' => $slug]);
    }

    public function updatePassword(ConfirmPasswordRequest $request, $slug_url)
    {
        $person = Person::where('slug', $slug_url)->first();
        $data_user = User::where('user_id', $person->user_id)->first();
        $data_user->update([
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash(
            'alert-success-update-password',
            '¡Contraseña actualizada con éxito!'
        );

        return redirect('usuario/' . $slug_url . '/editar');
    }
}
