<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Latetime;
use App\Models\Attendance;
use App\Models\Schedule;


class AdminController extends Controller
{

 
    public function index()
    {   
        return view('admin.index');
    }

}
