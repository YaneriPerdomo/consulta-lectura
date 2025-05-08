<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class AdminEmployeeController extends Controller
{
    public function index(){

    }

    public function create(){

        $jobs = Job::all();
        return view("admin.create-employee", ['jobs' => $jobs]);
    }
}
