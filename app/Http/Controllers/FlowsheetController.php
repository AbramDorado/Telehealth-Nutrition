<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Flowsheet;

class FlowsheetController extends Controller
{

    private $flowsheet;

    public function index()
    {   
        return view('flowsheet');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'breathing' => 'nullable|string',
            'pulse' => 'nullable|string',
            'bp_systolic' => 'nullable|integer',
            'bp_diastolic' => 'nullable|integer',
            'rhythm_on_check' => 'nullable|string',
            'rhythm_with_pulse' => 'nullable|string',
            'rhythm_intervention' => 'nullable|string',
            'joules' => 'nullable|integer',
            'epinephrine_dose' => 'nullable|numeric',
            'epinephrine_route' => 'nullable|string',
            'amiodarone_dose' => 'nullable|numeric',
            'amiodarone_route' => 'nullable|string',
            'lidocaine_dose' => 'nullable|numeric',
            'lidocaine_route' => 'nullable|string',
            'free1_label' => 'nullable|string',
            'free1_dose' => 'nullable|numeric',
            'free1_route' => 'nullable|string',
            'free2_label' => 'nullable|string',
            'free2_dose' => 'nullable|numeric',
            'free2_route' => 'nullable|string',
            'comments' => 'nullable|string',
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
        
        $time = $request->input('time');
        $carbonTime = Carbon::parse($time);
        $flowsheet->log_time = $carbonTime;
        $flowsheet->save();

        return view('outcome');
             
    }        
}
