<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
     public function index(){
        
        $yaneri = User::find(1);
        $yaneri->name = 'yane3';
         return $yaneri;

         /*
          User::create([
            'role_id' => 1,
            'name' => 'yaneri',
            'email' => 'perdomopaolabarrios@gmail.com',
            'password' => hash::make('123')
         ]);
         // Eliminar un rol específico y devolver la lista actualizada
        $role = Role::find(4);

        if ($role) {
            $role->delete();
            return Role::all(); // Devuelve todos los roles (excepto el eliminado)
        } else {
            return response()->json(['message' => 'Rol no encontrado'], 404);
        } */
     }
}
