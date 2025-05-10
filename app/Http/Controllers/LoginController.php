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
            $request->session()->regenerate();
            if (Auth::user()->rol_id == 2) { //Rol de usuario principalmente para guardar la relación de la tabla de personas con la sesión
                $user = Auth::user()->load('person');
                $request->session()->put('name', $user->person->name);
            } else if (Auth::user()->rol_id == 3) {

            }
            return redirect()->intended('/recursos-b');
        } else {
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
