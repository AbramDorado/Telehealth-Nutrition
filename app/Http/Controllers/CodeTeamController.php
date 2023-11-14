<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CodeTeam;
use Illuminate\Http\Request;

class CodeTeamController extends Controller
{
    private $codeTeam;

    public function index($code_number)
    {   
        $usersController = new UserController();
        $users = $usersController->getNames(); 
        return view('codeteam', compact('code_number', 'users'));
    }

    public function showCodeTeamForm($code_number) {
        $usersController = new UserController();
        $users = $usersController->getNames(); 
        return view('codeteam', ['code_number' => $code_number, 'users' => $users]);
    }

    public function store(Request $request, $code_number)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'code_team_leader' => 'required',
            'code_team_co_leader' => 'nullable',
            'recorder' => 'required',
            'code_team_member' => 'nullable|array',
            'intubated_by' => 'nullable',
            // Add validation rules for other fields as needed
        ]);
    
        // Create a new CodeTeam instance and fill it with the user's responses
        $codeTeam = new CodeTeam();
        $codeTeam->code_team_leader = $validatedData['code_team_leader'];
        $codeTeam->code_team_co_leader = $validatedData['code_team_co_leader'];
        $codeTeam->recorder = $validatedData['recorder'];
        $codeTeam->code_team_member = $validatedData['code_team_member'] ? implode(',', $validatedData['code_team_member']) : null;
        $codeTeam->intubated_by = $validatedData['intubated_by'];
    
        // Save the CodeTeam instance to the database
        $codeTeam->code_number = $code_number;
        $codeTeam->save();
    
        return view('evaluation', compact('code_number'));
    }
    
    
}
