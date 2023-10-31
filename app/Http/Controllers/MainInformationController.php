<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient; 
use App\Models\CodeBlueActivation;  


class MainInformationController extends Controller
{
    public function index()
    {   
        return view('maininformation');
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'patient_pin' => 'nullable|integer',
        'first_name' => 'nullable|string',
        'last_name' => 'nullable|string',
        'middle_name' => 'nullable|string',
        'suffix' => 'nullable|string',
        'visit_number' => 'nullable|integer',
        'birthday' => 'nullable|date',
        'age' => 'nullable|integer',
        'sex' => 'nullable|string',
        'height' => 'nullable|numeric',
        'weight' => 'nullable|numeric',
        'allergies' => 'nullable|string',
        'location' => 'nullable|string',
    ]);        

    $patient = new Patient;

    $patient->patient_pin = $validatedData['patient_pin'];
    $patient->first_name = $validatedData['first_name'];
    $patient->last_name = $validatedData['last_name'];
    $patient->middle_name = $validatedData['middle_name'];
    $patient->suffix = $validatedData['suffix'];
    $patient->visit_number = $validatedData['visit_number'];
    $patient->birthday = $validatedData['birthday'];
    $patient->age = $validatedData['age'];
    $patient->sex = $validatedData['sex'];
    $patient->height = $validatedData['height'];
    $patient->weight = $validatedData['weight'];
    $patient->allergies = $validatedData['allergies'];
    $patient->location = $validatedData['location'];

    $patient->save();

    $validatedData2 = $request->validate([
        'code_number' => 'nullable|integer',
        'code_start_dt' => 'nullable|date',
        'arrest_dt' => 'nullable|date',
        'reason_for_activation' => 'required|in:unconscious,pulseless',
        'initial_reporter' => 'nullable|string',
        'code_team_arrival_dt' => 'nullable|date',
        'e_cart_arrival_dt' => 'nullable|date',
        'witnessed' => 'required|in:yes,no',
    ]);

    $codeBlueActivation = new CodeBlueActivation;

    // $codeBlueActivation->code_number =  $validatedData2['code_number'];
    $codeBlueActivation->code_start_dt = $validatedData2['code_start_dt'];
    $codeBlueActivation->arrest_dt = $validatedData2['arrest_dt'];
    $codeBlueActivation->reason_for_activation = $validatedData2['reason_for_activation'];
    $codeBlueActivation->initial_reporter = $validatedData2['initial_reporter'];
    $codeBlueActivation->code_team_arrival_dt = $validatedData2['code_team_arrival_dt'];
    $codeBlueActivation->e_cart_arrival_dt = $validatedData2['e_cart_arrival_dt'];
    $codeBlueActivation->witnessed = $validatedData2['witnessed'];
    $codeBlueActivation->patient_pin = $patient->patient_pin;

    $codeBlueActivation->save();

    return view('initialresuscitation');
}
}
