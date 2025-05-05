<?php

namespace App\Http\Controllers;
use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserConfigurationController extends Controller
{
    public function index(){
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
                $data_person = Person::Where('user_id', $user_id)->first();    
                return view('user.configuration',['data_user' => $data_user, 'data_person' => $data_person]);
            break;
            default:
               # code...
            break;
        }
    }
}
