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
        $code_number = request('code_number', '000'); // Use a default value of '000' if not present in the request
        return view('maininformation', compact('code_number'));
    }
    public function store(Request $request, $code_number)
    {
        $validatedData = $request->validate([
            'patient_pin' => 'sometimes|nullable|integer',
            'first_name' => 'sometimes|nullable|string',
            'last_name' => 'sometimes|nullable|string',
            'middle_name' => 'sometimes|nullable|string',
            'suffix' => 'sometimes|nullable|string',
            'visit_number' => 'sometimes|nullable|integer',
            'birthday' => 'sometimes|nullable|date',
            'age' => 'sometimes|nullable|integer',
            'sex' => 'sometimes|nullable|string',
            'height' => 'sometimes|nullable|numeric',
            'weight' => 'sometimes|nullable|numeric',
            'allergies' => 'sometimes|nullable|string',
            'location' => 'sometimes|nullable|string',
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
    $patientPin = $patient->patient_pin;

    $validatedData2 = $request->validate([
        'code_start_dt' => 'sometimes|nullable|date',
        'arrest_dt' => 'sometimes|nullable|date',
        'reason_for_activation' => 'sometimes|in:unconscious,pulseless',
        'initial_reporter' => 'sometimes|nullable|string',
        'code_team_arrival_dt' => 'sometimes|nullable|date',
        'e_cart_arrival_dt' => 'sometimes|nullable|date',
        'witnessed' => 'sometimes|in:yes,no',
        'patient_pin' => 'sometimes|nullable|integer',
    ]);
    

    $validatedData2['patient_pin'] = $patientPin;

    $codeBlueActivation = new CodeBlueActivation;

    // $codeBlueActivation->code_number =  $validatedData2['code_number'];
    $codeBlueActivation->code_start_dt = $validatedData2['code_start_dt'];
    $codeBlueActivation->arrest_dt = $validatedData2['arrest_dt'];
    $codeBlueActivation->reason_for_activation = $validatedData2['reason_for_activation'];
    $codeBlueActivation->initial_reporter = $validatedData2['initial_reporter'];
    $codeBlueActivation->code_team_arrival_dt = $validatedData2['code_team_arrival_dt'];
    $codeBlueActivation->e_cart_arrival_dt = $validatedData2['e_cart_arrival_dt'];
    $codeBlueActivation->witnessed = $validatedData2['witnessed'];
    $codeBlueActivation->patient_pin = $validatedData2['patient_pin'];

    $codeBlueActivation->save();

    return view('initialresuscitation', ['code_number' => $code_number]);
}
}
