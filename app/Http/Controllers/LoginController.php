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
                /*dd($user->person->name); */
                $request->session()->put('name', $user->person->name);  
                /*  $request->session()->put('user', Auth::user()->name); 

                 @if (Auth::user()->person)
                    {{ Auth::user()->person->name }}
                @else
                    {{ Auth::user()->name ?? 'Nombre no disponible' }} {{-- Fallback al nombre del usuario si no hay persona --}}
                @endif

                    @auth
                    @if (Auth::user() && Auth::user()->role_id != 1)
                        {{session('name', 'Nombre no disponible') }}
                    @endif
                @endauth
                */
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
