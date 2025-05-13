<?php

namespace App\Http\Controllers;
use App\Http\Requests\ConfirmPasswordRequest;
use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\ConfigurationRequest;
use App\Models\Employee;
use App\Models\Job;
use App\Models\Person;
use App\Models\Room;
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

            switch ($data_user->rol_id) {
                case 1:
                    return view("admin.configuration", ['data_user' => $data_user]);
                    break;
                case 2:
                    $data_person = Person::findOrFail(Auth::user()->person->person_id);
                    return view("user.configuration", ['data_user' => $data_user, 'data_person' => $data_person]);
                    break;
                case 3:
                    $data_employee = Employee::where('user_id', Auth::user()->user_id)->first();

                    $jobs = Job::all();
                    $rooms = Room::all();
                    return view('employee.configuration', [
                        'data_user' => $data_user,
                        'data_employee' => $data_employee,
                        'rooms' => $rooms,
                        'jobs' => $jobs
                    ]);
                    break;
                default:
                    break;
            }
       
    }

    public function update(ConfigurationRequest $request)
    {

        switch (Auth::user()->rol_id) {

            case 1:

                try {
                    FacadesDB::beginTransaction();

                    $user_id = Auth::user()->user_id;
                    $data_user = User::find($user_id);

                    if ($data_user->user == $request->user && $data_user->email == $request->email) {
                        return redirect('/configuracion');
                    } else {

                        $data_user->update([
                            'user' => $request->user,
                            'email' => $request->email,
                        ]);

                        FacadesDB::commit();

                        $request->session()->flash('alert-success-update-data', 'Tus datos personales se han actualizado.');

                        return redirect('/configuracion');
                    }

                } catch (\Exception $ex) {
                    FacadesDB::rollBack();
                    throw $ex;
                }
                break;
            case 2:
                try {

                    FacadesDB::beginTransaction();

                    $name_lastname = explode(' ', $request->name_lastname);
                    $user_id = Auth::user()->user_id;

                    $data_user = User::find($user_id);
                    $data_person = Person::find(Auth::user()->person->person_id);

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
                        return redirect('/configuracion');
                    } else {

                        $data_user->update([
                            'user' => $request->user,
                            'email' => $request->email,
                        ]);

                        $slug_update = converter_slug($request->name_lastname);

                        $data_person->update([
                            'avatar_id' => $request->avatar_id,
                            'identity_card_id' => $request->identity_card_id,
                            'gender_id' => $request->gender_id,
                            'name' => $name_lastname[0],
                            'lastname' => $name_lastname[1],
                            'number' => $request->number,
                            'cedula' => $request->cedula,
                            'slug' => $slug_update
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
                break;
            default:
            case 3:

                break;
                echo 'No hay ningun roo';
                break;
        }
    }

    public function updatePassword(ConfirmPasswordRequest $request)
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
