<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Soap;
use App\Models\PatientInformation;

class SoapController extends Controller
{
    private $soap;

    public function index($patient_number)
    {

        $soap = Soap::where('patient_number', $patient_number)
            ->orderBy('created_at', 'desc')
            ->first();
        return view('soap', compact('patient_number', 'soap'));
    }
}
