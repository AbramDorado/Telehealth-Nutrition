<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient; 
use App\Models\CodeBlueActivation;  


class MainInformationController extends Controller
{
    public function index($code_number)
    {   
        $code_number = request('code_number', '000'); 
        // $patient = Patient::where('code_number', $code_number)->first();

        $codeBlueActivation = CodeBlueActivation::where('code_number', $code_number)->first();
        // dd($codeBlueActivation);
        return view('maininformation', compact('code_number', 'codeBlueActivation'));
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

    $patient->patient_pin = $validatedData['patient_pin'] ?? null;
    $patient->first_name = $validatedData['first_name'] ?? null;
    $patient->last_name = $validatedData['last_name'] ?? null;
    $patient->middle_name = $validatedData['middle_name'] ?? null;
    $patient->suffix = $validatedData['suffix'] ?? null;
    $patient->visit_number = $validatedData['visit_number'] ?? null;
    $patient->birthday = $validatedData['birthday'] ?? null;
    $patient->age = $validatedData['age'] ?? null;
    $patient->sex = $validatedData['sex'] ?? null;
    $patient->height = $validatedData['height'] ?? null;
    $patient->weight = $validatedData['weight'] ?? null;
    $patient->allergies = $validatedData['allergies'] ?? null;
    $patient->location = $validatedData['location'] ?? null;

    $patient->save();
    $patientPin = $patient->patient_pin;

    $validatedData2 = $request->validate([
        'code_start_dt' => 'sometimes|nullable|date',
        'arrest_dt' => 'sometimes|nullable|date',
        'reason_for_activation' => 'sometimes|nullable|in:unconscious,pulseless',
        'initial_reporter' => 'sometimes|nullable|string',
        'code_team_arrival_dt' => 'sometimes|nullable|date',
        'e_cart_arrival_dt' => 'sometimes|nullable|date',
        'witnessed' => 'sometimes|nullable|in:yes,no',  
        'patient_pin' => 'sometimes|nullable|integer',
    ]);
    

    $validatedData2['patient_pin'] = $patientPin;

    $codeBlueActivation = new CodeBlueActivation;

    // $codeBlueActivation->code_number =  $validatedData2['code_number'];
    $codeBlueActivation->code_start_dt = $validatedData2['code_start_dt'] ?? null;
    $codeBlueActivation->arrest_dt = $validatedData2['arrest_dt'];
    $codeBlueActivation->reason_for_activation = $validatedData2['reason_for_activation'] ?? null;
    $codeBlueActivation->initial_reporter = $validatedData2['initial_reporter'] ?? null;
    $codeBlueActivation->code_team_arrival_dt = $validatedData2['code_team_arrival_dt'] ?? null;
    $codeBlueActivation->e_cart_arrival_dt = $validatedData2['e_cart_arrival_dt'] ?? null;
    $codeBlueActivation->witnessed = $validatedData2['witnessed'] ?? null;
    $codeBlueActivation->patient_pin = $validatedData2['patient_pin'] ?? null;

    $codeBlueActivation->save();

    return view('initialresuscitation', ['code_number' => $code_number]);
    }

    public function updatePatient(Request $request, $patient_pin)
    {   
        $patient = Patient::findOrFail($patient_pin);
        $patient->patient_pin = $request->input('patient_pin');
        $patient->first_name = $request->input('first_name');
        $patient->last_name = $request->input('last_name');
        $patient->middle_name = $request->input('middle_name');
        $patient->suffix = $request->input('suffix');
        $patient->visit_number = $request->input('visit_number');
        $patient->birthday = $request->input('birthday');
        $patient->age = $request->input('age');
        $patient->sex = $request->input('sex');
        $patient->height = $request->input('height');
        $patient->weight = $request->input('weight');
        $patient->allergies = $request->input('allergies');
        $patient->location = $request->input('location');
     
        $patient->save();

        return redirect()->back()->with('success', 'Patient updated successfully.');
    }
}
