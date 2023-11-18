<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CodeBlueActivation;

class FormController extends Controller
{

    public function view($code_number) {
        // Logic for viewing a resuscitation event
    }
    
    public function edit($code_number) {
        // Logic for editing a resuscitation event
    }
    
    public function delete($code_number) {
        // Logic for deleting a resuscitation event
    }

    
    public function index()
    {

        $resuscitationEvents = CodeBlueActivation::select(
            'table2.code_number',
            'table1.created_at',
            'table1.location',
            'table1.first_name',
            'table1.last_name',
            'table2.code_start_dt',
            'table3.code_end_dt',
            'table4.code_team_leader'
        )
        ->from('patients as table1')
        ->leftjoin('code_blue_activations as table2', 'table1.patient_pin', '=', 'table2.patient_pin')
        ->leftjoin('outcomes as table3', 'table2.code_number', '=', 'table3.code_number')
        ->leftjoin('code_teams as table4', 'table2.code_number', '=', 'table4.code_number') 
        ->orderBy('table1.created_at', 'desc')
        ->get();

        return view('includes/codeblueforms', compact('resuscitationEvents'));
    }
}
