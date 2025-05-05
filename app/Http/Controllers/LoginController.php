<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Asegúrate de usar Hash para las contraseñas

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('user', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3){
                $user = Auth::user()->load('person');
                $request->session()->put('name', $user->person->name);  
                /* $user = User::with(['person.avatar'])->find(Auth::id());
        
         Auth::setUser($user); */
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
