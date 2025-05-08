<?php

namespace App\Http\Controllers;

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

   }

   public function create()
   {

      $jobs = Job::all();
      $rooms = Room::all();
      return view("admin.create-employee", ['jobs' => $jobs, 'rooms' => $rooms]);
   }

   public function store(CreateAccountUserEmployeeRequest $request)
   {


      $name_lastname = explode(' ', $request->name_lastname);

      try {
         FacadesDB::beginTransaction();
         $new_user = User::create([
            'role_id' => 2,
            'user' => $request->user,
            'email' => $request->email,
            'password' => Hash::make($request->password)
         ]);

         $new_employee = Employee::create([
            'user_id' => $new_user->user_id,
            'avatar_id' => $request->avatar_id,
            'identity_card_id' => $request->identity_card_id,
            'room_id' => $request->room_id,
            'job_id' => $request->job_id,
            'cedula' => $request->cedula,
            'name' => $name_lastname[0],
            'lastname' => $name_lastname[1],
            'email' => $request->email,
            'number' => $request->number

         ]);
         FacadesDB::commit();
         $request->session()->flash(
            'alert-success',
            'Tu registro se ha completado. Ya puedes iniciar sesión en tu cuenta.'
         );
         return redirect('/usuario/create');
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
      return view('admin.update-employee', [
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
            $data_employee->number == $request->number
         ) {
            return redirect('/usuarios/' . $data_user->user . '/editar');
         } else {

            $data_user->update([
               'user' => $request->user,
               'email' => $request->email,
            ]);

            $data_employee->number = $request->number;
            $data_employee->save();

            $data_employee->update([
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

            $request->session()->flash('alert-success-update-data', 'Los datos se han actualizado.');

            return redirect('/usuarios/' . $request->user . '/editar');
         }

      } catch (\Exception $ex) {
         FacadesDB::rollBack();
         throw $ex;
      }
   }
}
