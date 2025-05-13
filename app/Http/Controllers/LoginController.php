<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function attempt(Request $request)
    {
        $credentials = $request->only('user', 'password');

        if (Auth::attempt($credentials)) {
            $data_user = User::where('user', $request->user)->first(); // Usamos first() para obtener un solo modelo

            if ($data_user && $data_user->active == 1) { // Verificamos si $data_user existe y luego su estado
                $request->session()->regenerate();
                if (Auth::user()->rol_id == 2) { // Rol de usuario principalmente para guardar la relación de la tabla de personas con la sesión
                    $user = Auth::user()->load('person');
                    $request->session()->put('name', $user->person->name);
                } else if (Auth::user()->rol_id == 3) {
                    $user = Auth::user()->load('employee');
                    $request->session()->put('name', $user->employee->name);
                }
                return redirect()->intended('/recursos-b');
            } else {
                // La cuenta no está activa o el usuario no existe (si Auth::attempt fue exitoso pero no encontramos el usuario activo)
                return back()->withErrors(['user' => 'La cuenta no está activa. Por favor, contacta al administrador.']);
            }
        } else {
            // Las credenciales (usuario o contraseña) son incorrectas
            return back()->withErrors(['user' => 'Credenciales incorrectos.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/iniciar-sesion');
    }
}
