<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CodeBlueActivation; // Make sure to import the model
use App\Models\Patient;
use App\Models\CodeTeam;
use App\Models\Outcome;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    // public function archivedCodeBlueForms()
    // {
    //      // Retrieve archived code blue events with associated patient details from the database
    //     $archivedEvents = CodeBlueActivation::where('is_archived', true)->get();

    //     // Retrieve archived patient records
    //     // $archivedPatients = Patient::where('is_archived', true)
    //     //     ->get();
        
    //     // Retrieve archived code team records
    //     $archivedCodeTeams = CodeTeam::where('is_archived', true)
    //         ->get();

    //     // Retrieve archived outcome records
    //     $archivedOutcomes = Outcome::where('is_archived', true)
    //         ->get();

    //     // Return the view for archived records
    //     return view('archived', [
    //         'archivedEvents' => $archivedEvents,
    //         // 'archivedPatietns' => $archivedPatients,
    //         'archivedCodeTeams' => $archivedCodeTeams,
    //         'archivedOutcomes' => $archivedOutcomes,
    //     ]);
    // }

    public function archivedCodeBlueForms()
    {
        // Retrieve archived code blue events with associated patient details from the database
        $archivedEvents = CodeBlueActivation::select(
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
            ->where('table2.is_archived', true) // Add this condition to filter archived events
            ->orderBy('table1.created_at', 'desc')
            ->get();

        // Return the view for archived records
        return view('archived', ['archivedEvents' => $archivedEvents]);
    }

}
