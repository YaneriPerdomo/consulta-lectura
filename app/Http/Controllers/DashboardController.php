<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        switch (Auth::user()->rol_id) {
            case 1:
                return view("admin.dashboard");                
            break;
            case 2: //Usuario

            break;
            default:
                # code...
                break;
        }
    }

}
