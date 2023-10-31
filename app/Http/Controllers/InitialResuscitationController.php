<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InitialResuscitation;

class InitialResuscitationController extends Controller
{
    private $initialResuscitation;

    public function index(){
        
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'breathing_upon_ca' => 'nullable|string',
            'first_ventilation_dt' => 'nullable|date',
            'ventilation' => 'nullable|string',
            'intubation_dt' => 'nullable|date',
            'et_tube_size' => 'nullable|string',
            'intubation_attempts' => 'nullable|integer',
            'et_tube_information' => 'sometimes|array', 
            'et_tube_information.*' => 'string',         
            'first_documented_rhythm_dt' => 'nullable|date',
            'first_pulseless_rhythm_dt' => 'nullable|date',
            'compressions_dt' => 'nullable|date',
            'aed_applied' => 'required|in:Yes,No',
            'aed_applied_dt' => 'nullable|date',
            'pacemaker_on' => 'required|in:Yes,No',
            'pacemaker_on_dt' => 'nullable|date',
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
        
        $initialResuscitation->save();
    }
}
