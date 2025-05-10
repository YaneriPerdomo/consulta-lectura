<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmPasswordRequest;
use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\CreateAccountUserEmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Employee;
use App\Models\Job;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
class AdminEmployeeController extends Controller
{
   public function index()
   {

      $users = User::where('rol_id', 3)
         ->with('employee')
         ->orderBy('user', 'asc')
         ->paginate(3);


      return view('admin.human-resources.employee.show-all', ['users' => $users]);
   }


   public function create()
   {

      $jobs = Job::all();
      $rooms = Room::all();
      return view("admin.human-resources.employee.create", ['jobs' => $jobs, 'rooms' => $rooms]);
   }

   public function store(Request $request)
   {


      $name_lastname = explode(' ', $request->name_lastname);

      try {
         FacadesDB::beginTransaction();
         $new_user = User::create([
            'rol_id' => 3,
            'user' => $request->user,
            'email' => $request->email ?? 'Nada',
            'password' => Hash::make($request->password)
         ]);

         $new_employee = Employee::create([
            'user_id' => $new_user->user_id,
            'avatar_id' => $request->avatar_id,
            'identity_card_id' => $request->identity_card_id,
            'room_id' => $request->room_id,
            'job_id' => $request->job_id,
            'gender_id' => $request->gender_id,
            'cedula' => $request->cedula,
            'name' => $name_lastname[0],
            'lastname' => $name_lastname[1],
            'number' => $request->number

         ]);

         $message_session = $request->gender_id == 1 ? 'La nuevo empleada ha sido registrado exitosamente.' : 'El nuevo empleado ha sido registrado exitosamente.';
         FacadesDB::commit();
         $request->session()->flash(
            'alert-success',
            $message_session
         );
         return redirect('/empleados');
      } catch (\Exception $ex) {
         FacadesDB::rollBack();
         throw $ex;
      }

   }

   public function edit($name_user)
   {

      $data_user = User::where('user', $name_user)->first();
      $data_employee = Employee::where('user_id', $data_user->user_id)->first();
      $jobs = Job::all();
      $rooms = Room::all();
      return view('admin.human-resources.employee.edit', [
         'data_user' => $data_user,
         'data_employee' => $data_employee,
         'jobs' => $jobs,
         'rooms' => $rooms
      ]);
   }

   public function update(EmployeeUpdateRequest $request)
   {

      try {
         FacadesDB::beginTransaction();

         $name_lastname = explode(' ', $request->name_lastname);

         $user_id = $request->user_id;

         $data_user = User::find($user_id);
         $data_employee = Employee::where('user_id', $user_id)->first();


         if (
            $data_user->user == $request->user &&
            $data_user->email == $request->email &&
            $data_employee->name == $name_lastname[0] &&
            $data_employee->lastname == $name_lastname[1] &&
            $data_employee->cedula == $request->cedula &&
            $data_employee->identity_card_id == $request->identity_card_id &&
            $data_employee->room_id == $request->room_id &&
            $data_employee->job_id == $request->job_id &&
            $data_employee->avatar_id == $request->avatar_id &&
            $data_employee->number == $request->number &&
            $data_employee->gender_id == $request->gender_id
         ) {
            return redirect('/empleado/' . $data_user->user . '/editar');
         } else {

            $data_user->update([
               'user' => $request->user,
               'email' => $request->email,
            ]);

            $data_employee->number = $request->number;
            $data_employee->save();

            $data_employee->update([
               'gender_id' => $request->gender_id,
               'avatar_id' => $request->avatar_id,
               'identity_card_id' => $request->identity_card_id,
               'room_id' => $request->room_id,
               'job_id' => $request->job_id,
               'cedula' => $request->cedula,
               'name' => $name_lastname[0],
               'lastname' => $name_lastname[1],
               'number' => $request->number
            ]);

            FacadesDB::commit();

            $request->session()->flash('alert-success-update-data', 'Los datos personales se han actualizado.');

            return redirect('recursos-humanos/empleado/' . $request->user . '/editar');
         }

      } catch (\Exception $ex) {
         FacadesDB::rollBack();
         throw $ex;
      }
   }

   public function updatePassword(ConfirmPasswordRequest $request, $name_user)
   {
      $data_user = User::where('user', $name_user)->first();
      $data_user->update([
         'password' => Hash::make($request->password),
      ]);

      $request->session()->flash(
         'alert-success-update-password',
         '¡Contraseña actualizada con éxito!'
      );

      return redirect('recursos-humanos/empleado/' . $data_user->user . '/editar');
   }

   public function showDeleteAccount()
   {
      return view('admin.human-resources.employee.delete');
   }

   //show viw delete-account employee
   public function destroy(ConfirmPasswordRequest $request, $name_user)
   {

   }
}
