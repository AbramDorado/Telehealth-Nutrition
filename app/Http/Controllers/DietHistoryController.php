<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DietHistory;
use App\Models\PatientInformation;

class DietHistoryController extends Controller
{
    private $diethistory;

    public function index($patient_number)
    {

        $diethistory = DietHistory::where('patient_number', $patient_number)
            ->orderBy('created_at', 'desc')
            ->first();
        return view('diethistory', compact('patient_number', 'diethistory'));
    }
}
