<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;  // Import the Patient model
use App\Models\CodeBlueActivation;  // Import the CodeBlueActivation model


class MainInformationController extends Controller
{
    public function store(Request $request)
    {
        $patient = Patient::create([
            'patient_pin' => $request->input('patient_pin'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'middle_name' => $request->input('middle_name'),
            'suffix' => $request->input('suffix'),
            'visit_number' => $request->input('visit_number'),
            'birthday' => $request->input('birthday'),
            'age' => $request->input('age'),
            'sex' => $request->input('sex'),
            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
            'allergies' => $request->input('allergies'),
            'location' => $request->input('location'),
        ]);
    
        $codeBlueActivation = CodeBlueActivation::create([
            'code_number' => $request->input('code_number'),
            'code_start_dt' => $request->input('code_start_dt'),
            'arrest_dt' => $request->input('arrest_dt'),
            'reason_for_activation' => $request->input('reason_for_activation'),
            'initial_reporter' => $request->input('initial_reporter'),
            'code_team_arrival_dt' => $request->input('code_team_arrival_dt'),
            'e-cart_arrival_dt' => $request->input('e-cart_arrival_dt'),
            'witnessed' => $request->input('witnessed'),
        ]);
    
        // Redirect to a success page or perform any other actions
        return redirect()->back()->with('success', 'Information saved successfully');
    }
}
