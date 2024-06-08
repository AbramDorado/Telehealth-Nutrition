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
        $validated = $request->validate([
            'last_name' => 'nullable|string|max:255',
            'first_name' => 'nullable|string|max:255',
            'middle_name' => 'nullable|string|max:255',
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
            'general_appearance' => 'nullable|string|max:255',
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

        $patient = PatientInformation::updateOrCreate(
            ['patient_number' => $patient_number],
            $validated
        );

        return redirect()->route('patientinformation', ['patient_number' => $patient->patient_number]);
    }
}
