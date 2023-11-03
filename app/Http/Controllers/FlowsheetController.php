<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Flowsheet;

class FlowsheetController extends Controller
{

    private $flowsheet;

    public function index($code_number)
    {   
        return view('flowsheet', compact('code_number'));
    }

    public function store(Request $request, $code_number)
    {
        $validatedData = $request->validate([
            'breathing' => 'sometimes|nullable|string',
            'pulse' => 'sometimes|nullable|string',
            'bp_systolic' => 'sometimes|nullable|integer',
            'bp_diastolic' => 'sometimes|nullable|integer',
            'rhythm_on_check' => 'sometimes|nullable|string',
            'rhythm_with_pulse' => 'sometimes|nullable|string',
            'rhythm_intervention' => 'sometimes|nullable|string',
            'joules' => 'sometimes|nullable|integer',
            'epinephrine_dose' => 'sometimes|nullable|numeric',
            'epinephrine_route' => 'sometimes|nullable|string',
            'amiodarone_dose' => 'sometimes|nullable|numeric',
            'amiodarone_route' => 'sometimes|nullable|string',
            'lidocaine_dose' => 'sometimes|nullable|numeric',
            'lidocaine_route' => 'sometimes|nullable|string',
            'free1_label' => 'sometimes|nullable|string',
            'free1_dose' => 'sometimes|nullable|numeric',
            'free1_route' => 'sometimes|nullable|string',
            'free2_label' => 'sometimes|nullable|string',
            'free2_dose' => 'sometimes|nullable|numeric',
            'free2_route' => 'sometimes|nullable|string',
            'comments' => 'sometimes|nullable|string',
        ]);
        
        
        $flowsheet = new Flowsheet;
        
        $flowsheet->breathing = $validatedData['breathing'];
        $flowsheet->pulse = $validatedData['pulse'];
        $flowsheet->bp_systolic = $validatedData['bp_systolic'];
        $flowsheet->bp_diastolic = $validatedData['bp_diastolic'];
        $flowsheet->rhythm_on_check = $validatedData['rhythm_on_check'];
        $flowsheet->rhythm_with_pulse = $validatedData['rhythm_with_pulse'];
        $flowsheet->rhythm_intervention = $validatedData['rhythm_intervention'];
        $flowsheet->joules = $validatedData['joules'];
        $flowsheet->epinephrine_dose = $validatedData['epinephrine_dose'];
        $flowsheet->epinephrine_route = $validatedData['epinephrine_route'];
        $flowsheet->amiodarone_dose = $validatedData['amiodarone_dose'];
        $flowsheet->amiodarone_route = $validatedData['amiodarone_route'];
        $flowsheet->lidocaine_dose = $validatedData['lidocaine_dose'];
        $flowsheet->lidocaine_route = $validatedData['lidocaine_route'];
        $flowsheet->free1_label = $validatedData['free1_label'];
        $flowsheet->free1_dose = $validatedData['free1_dose'];
        $flowsheet->free1_route = $validatedData['free1_route'];
        $flowsheet->free2_label = $validatedData['free2_label'];
        $flowsheet->free2_dose = $validatedData['free2_dose'];
        $flowsheet->free2_route = $validatedData['free2_route'];
        $flowsheet->comments = $validatedData['comments'];
        $flowsheet->code_number =  $code_number;

        $time = $request->input('time');
        $carbonTime = Carbon::parse($time);
        $flowsheet->log_time = $carbonTime;
        $flowsheet->save();

        return view('flowsheet', compact('code_number'));
    }     
}
