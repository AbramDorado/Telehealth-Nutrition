<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function storeOrUpdate(Request $request, $patient_pin, $code_number)
    {
        $existingPatient = Patient::where('patient_pin', $patient_pin)->first();

        if ($existingPatient) {
            // If the patient exists, update the existing patient's information
            return $this->updatePatient($request, $patient_pin, $code_number);
        }

        // Create a new patient
        $patient = new Patient;
        $patient->fill($request->all());
        $patient->patient_pin = $patient_pin;
        $patient->save();

        return view('initialresuscitation', ['code_number' => $code_number]);
    }

    private function updatePatient(Request $request, $patient_pin, $code_number)
    {
        $patient = Patient::findOrFail($patient_pin);
        $patient->fill($request->all());
        $patient->save();

        return view('initialresuscitation', ['code_number' => $code_number]);
    }
}
