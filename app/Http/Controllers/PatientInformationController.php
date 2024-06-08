<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientInformationController extends Controller
{

    public function index()
    {
        return view('patientinformation'); // Blade file name
    }
    

}
