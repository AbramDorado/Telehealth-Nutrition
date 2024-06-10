<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Soap;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class SoapController extends Controller
{
    public function index($patient_number)
    {
        $soap_logs = Soap::where('patient_number', $patient_number)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('soap', compact('patient_number', 'soap_logs'));
    }

    public function store(Request $request, $patient_number)
    {
        Log::debug("Function called");

        $validatedData = $request->validate([
            'soap_dt' => 'required|date',
            'subjective' => 'sometimes|nullable|string',
            'bp' => 'sometimes|nullable|string',
            'pr' => 'sometimes|nullable|string',
            'rr' => 'sometimes|nullable|string',
            'temp' => 'sometimes|nullable|string',
            'height' => 'sometimes|nullable|string',
            'weight' => 'sometimes|nullable|string',
            'bmi_1' => 'sometimes|nullable|string',
            'ecg' => 'sometimes|nullable|string',
            'cxr' => 'sometimes|nullable|string',
            'cbc' => 'sometimes|nullable|string',
            'ua' => 'sometimes|nullable|string',
            'crea' => 'sometimes|nullable|string',
            'bun' => 'sometimes|nullable|string',
            'bua' => 'sometimes|nullable|string',
            'lipid_profile' => 'sometimes|nullable|string',
            'sgot' => 'sometimes|nullable|string',
            'sgpt' => 'sometimes|nullable|string',
            'fbs' => 'sometimes|nullable|string',
            'nak' => 'sometimes|nullable|string',
            'hbaic' => 'sometimes|nullable|string',
            'hepabs' => 'sometimes|nullable|string',
            'others' => 'sometimes|nullable|string',
            'assessment' => 'sometimes|nullable|string',
            'plan' => 'sometimes|nullable|string',
        ]);

        Log::debug("It reached here");

        // Create the new SOAP record
        $soap = new Soap();

        $soap->soap_dt = $validatedData['soap_dt'];
        $soap->subjective = $validatedData['subjective'] ?? null;
        $soap->bp = $validatedData['bp'] ?? null;
        $soap->pr = floatval($validatedData['pr']) ?? null;
        $soap->rr = floatval($validatedData['rr']) ?? null;
        $soap->temp = floatval($validatedData['temp']) ?? null;
        $soap->height = floatval($validatedData['height']) ?? null;
        $soap->weight = floatval($validatedData['weight']) ?? null;
        $soap->bmi_1 = floatval($validatedData['bmi_1']) ?? null;
        $soap->ecg = $validatedData['ecg'] ?? null;
        $soap->cxr = $validatedData['cxr'] ?? null;
        $soap->cbc = $validatedData['cbc'] ?? null;
        $soap->ua = $validatedData['ua'] ?? null;
        $soap->crea = $validatedData['crea'] ?? null;
        $soap->bun = $validatedData['bun'] ?? null;
        $soap->bua = $validatedData['bua'] ?? null;
        $soap->lipid_profile = $validatedData['lipid_profile'] ?? null;
        $soap->sgot = $validatedData['sgot'] ?? null;
        $soap->sgpt = $validatedData['sgpt'] ?? null;
        $soap->fbs = $validatedData['fbs'] ?? null;
        $soap->nak = $validatedData['nak'] ?? null;
        $soap->hbaic = $validatedData['hbaic'] ?? null;
        $soap->hepabs = $validatedData['hepabs'] ?? null;
        $soap->others = $validatedData['others'] ?? null;
        $soap->assessment = $validatedData['assessment'] ?? null;
        $soap->plan = $validatedData['plan'] ?? null;
        $soap->is_archived = false;

        $soap->patient_number = $patient_number; // Associate the SOAP record with the patient
        $soap->save();

        // Redirect the user back to the SOAP page with the updated patient_number
        return redirect()->route('soap', ['patient_number' => $patient_number]);
    }

    public function update_form($log_id)
    {
        Log::debug("It update form");

        $soap = Soap::where('soap_id', $log_id)->first();
        $patient_number = $soap->patient_number;

        return view('update-soap', compact('patient_number', 'soap'));
    }

    public function update(Request $request, $log_id)
    {
        Log::debug("It update");

        $soap = Soap::where('soap_id', $log_id)->first();
        $patient_number = $soap->patient_number;

        $soap->fill($request->all());

        $soap->pr = floatval($request['pr']) ?? null;
        $soap->rr = floatval($request['rr']) ?? null;
        $soap->temp = floatval($request['temp']) ?? null;
        $soap->height = floatval($request['height']) ?? null;
        $soap->weight = floatval($request['weight']) ?? null;
        $soap->bmi_1 = floatval($request['bmi_1']) ?? null;
        $soap->save();

        return redirect()->route('soap', ['patient_number' => $patient_number]);
    }
}
