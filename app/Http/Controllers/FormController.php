<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class FormController extends Controller
{
    public function index()
    {

        $resuscitationEvents = Patient::select(
            'table1.patient_pin',
            'table1.created_at',
            'table1.location',
            'table1.first_name',
            'table1.last_name',
            'table2.code_start_dt',
            'table3.code_end_dt',
            // 'table4.code_team_leader
        )
        ->from('patients as table1')
        ->join('code_blue_activations as table2', 'table1.patient_pin', '=', 'table2.patient_pin')
        ->join('outcomes as table3', 'table2.code_number', '=', 'table3.code_number')
        // ->join('code_teams as table4', 'table3.', '=', 'table4.') 
        ->orderBy('table1.created_at', 'desc')
        ->get();

        return view('includes/codeblueforms', compact('resuscitationEvents'));
    }
}
