<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InitialResuscitation;
use App\Models\CodeBlueActivation;

class InitialResuscitationController extends Controller
{
    private $initialResuscitation;

    public function index($code_number)
    {
        $initialResuscitation = InitialResuscitation::where('code_number', $code_number)->first();
        return view('initialresuscitation', compact('code_number', 'initialResuscitation'));
    }

    public function store(Request $request, $code_number)
    {
        $validatedData = $request->validate([
            'breathing_upon_ca' => 'sometimes|nullable|string',
            'first_ventilation_dt' => 'sometimes|nullable|date',
            'ventilation' => 'sometimes|nullable|string',
            'intubation_dt' => 'sometimes|nullable|date',
            'et_tube_size' => 'sometimes|nullable|string',
            'intubation_attempts' => 'sometimes|nullable|integer',
            'et_tube_information' => 'sometimes|nullable|array',
            'et_tube_information.*' => 'sometimes|nullable|string',
            'first_documented_rhythm_dt' => 'sometimes|nullable|string',
            'first_pulseless_rhythm_dt' => 'sometimes|nullable|date',
            'compressions_dt' => 'sometimes|nullable|date',
            'aed_applied' => 'sometimes|required|in:Yes,No',
            'aed_applied_dt' => 'sometimes|nullable|date',
            'pacemaker_on' => 'sometimes|required|in:Yes,No',
            'pacemaker_on_dt' => 'sometimes|nullable|date',
        ]);        

        $initialResuscitation = new InitialResuscitation;

        $initialResuscitation->breathing_upon_ca = $validatedData['breathing_upon_ca'];
        $initialResuscitation->first_ventilation_dt = $validatedData['first_ventilation_dt'];
        $initialResuscitation->ventilation = $validatedData['ventilation'];
        $initialResuscitation->intubation_dt = $validatedData['intubation_dt'];
        $initialResuscitation->et_tube_size = $validatedData['et_tube_size'];
        $initialResuscitation->intubation_attempts = $validatedData['intubation_attempts'];
        $initialResuscitation->et_tube_information = json_encode($validatedData['et_tube_information'] ?? []);
        $initialResuscitation->first_documented_rhythm_dt = $validatedData['first_documented_rhythm_dt'];
        $initialResuscitation->first_pulseless_rhythm_dt = $validatedData['first_pulseless_rhythm_dt'];
        $initialResuscitation->compressions_dt = $validatedData['compressions_dt'];
        $initialResuscitation->aed_applied = $validatedData['aed_applied'];
        $initialResuscitation->aed_applied_dt = $validatedData['aed_applied_dt'];
        $initialResuscitation->pacemaker_on = $validatedData['pacemaker_on'];
        $initialResuscitation->pacemaker_on_dt = $validatedData['pacemaker_on_dt'];
        
        $initialResuscitation->code_number = $code_number;
        $initialResuscitation->save();

        return view('flowsheet', ['code_number' => $code_number]);

    }
}

