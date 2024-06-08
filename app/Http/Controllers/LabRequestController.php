<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LabRequest;
use App\Models\PatientInformation;

class LabRequestController extends Controller
{
    private $labrequest;

    public function index($patient_number)
    {

        $labrequest = LabRequest::where('patient_number', $patient_number)
            ->orderBy('created_at', 'desc')
            ->first();
        return view('labrequest', compact('patient_number', 'labrequest'));
    }
}
