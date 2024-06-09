<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PatientInformation;
use Illuminate\Http\Request;

class PatientInformationController extends Controller
{
    private $patientinformation;

    public function index($patient_number)
    {

        $patientinformation = PatientInformation::where('patient_number', $patient_number)
            ->orderBy('created_at', 'desc')
            ->first();
        return view('patientinformation', compact('patient_number', 'patientinformation'));
    }

    public function store(Request $request, $patient_number)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'last_name' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'suffix' => 'nullable|string|max:255',
            'sex' => 'nullable|string|max:10',
            'civil_status' => 'nullable|string|max:10',
            'birthday' => 'nullable|date',
            'age' => 'nullable|integer',
            'allergies' => 'nullable|string',
            'position' => 'nullable|string|max:255',
            'unit_assignment' => 'nullable|string|max:255',
            'home_address' => 'nullable|string|max:255',
            'bachelor_degree' => 'nullable|string|max:255',
            'date_entered_service' => 'nullable|date',
            'blood_type' => 'nullable|string|max:10',
            'religion' => 'nullable|string|max:255',
            'contact_number' => 'nullable|integer',
            'referral_control_num' => 'nullable|integer',
            'skin' => 'nullable|string|max:255',
            'heent' => 'nullable|string|max:255',
            'neck' => 'nullable|string|max:255',
            'chest' => 'nullable|string|max:255',
            'heart' => 'nullable|string|max:255',
            'breast' => 'nullable|string|max:255',
            'abdomen' => 'nullable|string|max:255',
            'musculoskeletal' => 'nullable|string|max:255',
            'neurologic' => 'nullable|string|max:255',
            'past_medical_history' => 'nullable|array',
            'operations' => 'nullable|string|max:255',
            'previous_hospitalization' => 'nullable|string|max:255',
            'current_medication' => 'nullable|string|max:255',
            'family_history' => 'nullable|string|max:255',
            'psychosocial_history' => 'nullable|string|max:255',
            'obstetric_score' => 'nullable|string|max:255',
            'lmp' => 'nullable|string|max:255',
            'menarche' => 'nullable|string|max:255',
            'is_archived' => 'nullable|boolean',
        ]);

        // Create a new instance of the PatientInformation model and fill it with the validated data
        $patientinformation = new PatientInformation();
        $patientinformation->last_name = $validatedData['last_name'] ?? null;
        $patientinformation->first_name = $validatedData['first_name'] ?? null;
        $patientinformation->middle_name = $validatedData['middle_name'] ?? null;
        $patientinformation->suffix = $validatedData['suffix'] ?? null;
        $patientinformation->sex = $validatedData['sex'] ?? null;
        $patientinformation->civil_status = $validatedData['civil_status'] ?? null;
        $patientinformation->birthday = $validatedData['birthday'] ?? null;
        $patientinformation->age = $validatedData['age'] ?? null;
        $patientinformation->allergies = $validatedData['allergies'] ?? null;
        $patientinformation->position = $validatedData['position'] ?? null;
        $patientinformation->unit_assignment = $validatedData['unit_assignment'] ?? null;
        $patientinformation->home_address = $validatedData['home_address'] ?? null;
        $patientinformation->bachelor_degree = $validatedData['bachelor_degree'] ?? null;
        $patientinformation->date_entered_service = $validatedData['date_entered_service'] ?? null;
        $patientinformation->blood_type = $validatedData['blood_type'] ?? null;
        $patientinformation->religion = $validatedData['religion'] ?? null;
        $patientinformation->contact_number = $validatedData['contact_number'] ?? null;
        $patientinformation->referral_control_num = $validatedData['referral_control_num'] ?? null;
        $patientinformation->skin = $validatedData['skin'] ?? null;
        $patientinformation->heent = $validatedData['heent'] ?? null;
        $patientinformation->neck = $validatedData['neck'] ?? null;
        $patientinformation->chest = $validatedData['chest'] ?? null;
        $patientinformation->heart = $validatedData['heart'] ?? null;
        $patientinformation->breast = $validatedData['breast'] ?? null;
        $patientinformation->abdomen = $validatedData['abdomen'] ?? null;
        $patientinformation->musculoskeletal = $validatedData['musculoskeletal'] ?? null;
        $patientinformation->neurologic = $validatedData['neurologic'] ?? null;
        $patientinformation->past_medical_history = $validatedData['past_medical_history'] ?? null;
        $patientinformation->operations = $validatedData['operations'] ?? null;
        $patientinformation->previous_hospitalization = $validatedData['previous_hospitalization'] ?? null;
        $patientinformation->current_medication = $validatedData['current_medication'] ?? null;
        $patientinformation->family_history = $validatedData['family_history'] ?? null;
        $patientinformation->psychosocial_history = $validatedData['psychosocial_history'] ?? null;
        $patientinformation->obstetric_score = $validatedData['obstetric_score'] ?? null;
        $patientinformation->lmp = $validatedData['lmp'] ?? null;
        $patientinformation->menarche = $validatedData['menarche'] ?? null;

        // Create a new instance of the PatientInformation model and fill it with the validated data
        $patientinformation = new PatientInformation();
        $patientinformation->fill($validatedData);
        $patientinformation->patient_number = $patient_number;

        // Save the medical information to the database
        $patientinformation->save();

        // Set the patient_number in session
        session(['patient_number' => $patientinformation->patient_number]);

        // Redirect the user back to the previous page or wherever you want
        return redirect()->route('includes/nutritionforms');
        // return view('soap')->with('success', 'Patient information saved successfully.');
    }
}
