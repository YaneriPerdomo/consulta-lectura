<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Auth;
use Illuminate\Http\Request;

class ProfileReader extends Controller
{
    public function recent()
    {
        
        return view('user.profile.recent', [
            'hour_created_at' => formatting_hour(Auth::user()->created_at, 10),
            'hour_updated_at' => formatting_hour(Auth::user()->updated_at, 10),
        ]);
    }

    public function ratings()
    {
       

        return view('user.profile.ratings', [
            'hour_created_at' => formatting_hour(Auth::user()->created_at, 10),
            'hour_updated_at' => formatting_hour(Auth::user()->updated_at, 10),
        ]);
    }

    public function favorites()
    {
        return view('user.profile.favorites', [
            'hour_created_at' => formatting_hour(Auth::user()->created_at, 10),
            'hour_updated_at' => formatting_hour(Auth::user()->updated_at, 10),
        ]);
    }

}
