<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient; 
use App\Models\CodeBlueActivation;  


class MainInformationController extends Controller
{
    function index($code_number)
    {   
        $codeBlueActivation = CodeBlueActivation::where('code_number', $code_number)->first();

        $patient = null;
        if ($codeBlueActivation) {
            $patient = Patient::where('patient_pin', $codeBlueActivation->patient_pin)->first();
        }

        return view('maininformation', compact('code_number', 'codeBlueActivation', 'patient'));
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
               
        // Check if the patient with the given patient_pin already exists
    $existingPatient = Patient::where('patient_pin', $validatedData['patient_pin'])->first();

    if ($existingPatient) {
        // If the patient exists, update the existing patient's information
        return $this->updatePatient($request, $validatedData['patient_pin'], $code_number);
    }

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

    public function updatePatient(Request $request, $patient_pin, $code_number)
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
        
    
        $validatedData2['patient_pin'] = $patient_pin;
    
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


    public function searchPatientPins(Request $request)
    {
        $input = $request->input('query');

        $patientPins = Patient::where('patient_pin', 'LIKE', $input . '%')->pluck('patient_pin');

        return response()->json($patientPins);
    }


    public function fetchPatientInformation(Request $request)
    {
        $patientPin = $request->input('patient_pin');

        // Your logic to fetch patient information from the database based on $patientPin
        $patientInformation = Patient::where('patient_pin', $patientPin)->first();

        if ($patientInformation) {
            // If patient information is found, return it as JSON response
            return response()->json($patientInformation);
        } else {
            // If patient is not found, return an error response
            return response()->json(['error' => 'Patient not found'], 404);
        }
    }
    
}
