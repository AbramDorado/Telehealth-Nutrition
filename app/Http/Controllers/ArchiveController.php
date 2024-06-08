<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CodeBlueActivation; // Make sure to import the model
use App\Models\Patient;
use App\Models\CodeTeam;
use App\Models\Outcome;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    
    public function archivedNutritionForms()
    {
        // Retrieve archived code blue events with associated patient details from the database
        $archivedEvents = PatientInformation::select(
            'patient_number',
            'first_name',
            'age',
            'home_address',
            'contact_number',
        )->get();

        return view('archived', ['archivedEvents' => $archivedEvents]);
    }

}
