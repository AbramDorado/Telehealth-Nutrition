<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pcwm;
use App\Models\PatientInformation;

class PcwmController extends Controller
{
    private $pcwm;

    public function index($patient_number)
    {

        $pcwm = Pcwm::where('patient_number', $patient_number)
            ->orderBy('created_at', 'desc')
            ->first();
        return view('pcwm', compact('patient_number', 'pcwm'));
    }
}
