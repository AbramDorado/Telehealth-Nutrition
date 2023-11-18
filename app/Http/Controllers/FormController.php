<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CodeBlueActivation;

class FormController extends Controller
{

    // public function viewCodeBlueForms($code_number) {
    //     // Logic for viewing a resuscitation event
    // }
    
    // public function editCodeBlueForms($code_number) {
    //     // Logic for editing a resuscitation event
    // }
    
    // public function deleteCodeBlueForms($code_number) {
    //     // Delete all records associated with the specified code blue forms event
    //     CodeBlueActivation::where('code_number', $code_number)->delete();

    //     // Redirect back or to a specific route after deletion
    //     return redirect('codeblueforms');
    // }
    
    public function archive(Request $request, $codeNumber)
    {
        $codeBlueActivation = CodeBlueActivation::where('code_number', $codeNumber)->first();
        
        if ($codeBlueActivation) {
            $codeBlueActivation->update(['is_archived' => true]);
    
            // Handle archiving related records
            $codeBlueActivation->initialResuscitation()->update(['is_archived' => true]);
            $codeBlueActivation->flowsheet()->update(['is_archived' => true]);
            $codeBlueActivation->outcome()->update(['is_archived' => true]);
            $codeBlueActivation->evaluation()->update(['is_archived' => true]);
            $codeBlueActivation->codeTeam()->update(['is_archived' => true]);
    
            // Optionally handle archiving the connected patient
            $codeBlueActivation->patient->update(['is_archived' => true]);
    
            return redirect()->back()->with('success', 'Code Blue Activation Event archived successfully.');
        }
    
        return redirect()->back()->with('error', 'Code Blue Activation Event not found.');
    }

    public function unarchive(Request $request, $codeNumber)
    {
        $codeBlueActivation = CodeBlueActivation::where('code_number', $codeNumber)->first();

        if ($codeBlueActivation) {
            $codeBlueActivation->update(['is_archived' => false]);

            // Handle unarchiving related records if needed
            $codeBlueActivation->initialResuscitation()->update(['is_archived' => false]);
            $codeBlueActivation->flowsheet()->update(['is_archived' => false]);
            $codeBlueActivation->outcome()->update(['is_archived' => false]);
            $codeBlueActivation->evaluation()->update(['is_archived' => false]);
            $codeBlueActivation->codeTeam()->update(['is_archived' => false]);
    
            // Optionally handle unarchiving the connected patient
            $codeBlueActivation->patient->update(['is_archived' => false]);

            return redirect()->back()->with('success', 'Code Blue Activation Event unarchived successfully.');
        }

        return redirect()->back()->with('error', 'Code Blue Activation Event not found.');
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
        ->where('table2.is_archived', false) // Add this condition to filter out archived events
        ->orderBy('table1.created_at', 'desc')
        ->get();

        return view('includes/codeblueforms', compact('resuscitationEvents'));
    }
}
