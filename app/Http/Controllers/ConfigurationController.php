<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateAccountRequest;
use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ConfigurationController extends Controller
{
    public function index()
    {
        /*
             Auth::user()->fresh();
            Auth::user()->person->fresh();
         */
        $user_id = Auth::user()->user_id;
        $data_user = User::find($user_id);

        switch ($data_user->role_id) {
            case 1:
                # code...
                break;
            case 2: //Usuario

                $data_person = Person::findOrFail(Auth::user()->person->person_id);

                return view("user.configuration", ['data_user' => $data_user, 'data_person' => $data_person]);
                break;
            default:
                # code...
                break;
        }
    }

    public function update(Request $request)
    {

        try {
            FacadesDB::beginTransaction();

            $name_lastname = explode(' ', $request->name_lastname);
            $user_id = Auth::user()->user_id;


            $data_user = User::find($user_id);
            $data_person = Person::find(Auth::user()->person->person_id);

            if (
                $data_user->user == $request->user && $data_user->email &&
                $data_person->email == $request->email && $data_person->name == $name_lastname[0] &&
                $data_person->lastname == $name_lastname[1] && $data_person->cedula == $request->cedula &&
                $data_person->identity_card_id == $request->identity_card_id && $data_person->avatar_id == $request->avatar_id
            ) {
                return redirect('/configuracion');
            } else {

                $data_user->update([
                    'user' => $request->user,
                    'email' => $request->email,
                ]);

                $data_person->update([
                    'avatar_id' => $request->avatar_id,
                    'identity_card_id' => $request->identity_card_id,
                    'name' => $name_lastname[0],
                    'lastname' => $name_lastname[1],
                    'cedula' => $request->cedula,
                    'number' => $request->number
                ]);

                FacadesDB::commit();
                $user = User::with('person.avatar')->findOrFail($user_id);
                Auth::setUser($user);
                $request->session()->regenerate();

                $request->session()->flash('alert-success-update-data', 'Tus datos personales se han actualizado.');

                return redirect('/configuracion');
            }

        } catch (\Exception $ex) {
            FacadesDB::rollBack();
            throw $ex;
        }
    }

    public function updatePassword(Request $request)
    {
        $data_user = User::find(Auth::user()->user_id);
        $data_user->update([
            'password' => Hash::make($request->password),
        ]);
        $request->session()->flash(
            'alert-success-update-password',
            'Tu contraseña de usuario ha sido actualizada.'
        );

        return redirect('/configuracion');
    }
}
