<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccountUserEmployeeRequest;
use App\Models\Person;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;

class CreateAccountController extends Controller
{
   public function index()
   {
      return view('create-account');
   }

   public function store(CreateAccountRequest $request)
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

         $new_person = Person::create([
            'user_id' => $new_user->user_id,
            'avatar_id' => $request->avatar_id,
            'identity_card_id' => $request->identity_card_id,
            'name' => $name_lastname[0],
            'lastname' => $name_lastname[1],
            'cedula' => $request->cedula,
            'email' => $request->email,
            'number' => $request->number

         ]);
         FacadesDB::commit();
         $request->session()->flash('alert-success', 
                                 'Tu registro se ha completado. Ya puedes iniciar sesión en tu cuenta.'
                                    );
         return redirect('/iniciar-sesion');
      } catch (\Exception $ex) {
         FacadesDB::rollBack();
         throw $ex;
      }
   }
}
