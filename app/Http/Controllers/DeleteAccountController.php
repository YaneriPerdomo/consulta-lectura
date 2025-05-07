<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeleteAccountController extends Controller
{
    public function index(){
        return view('user.delete-account');
    }
}
