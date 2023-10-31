<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\CodeTeam;

class CodeTeamController extends Controller
{
    public function showCodeTeamForm() {
        $usersController = new UserController();
        $users = $usersController->getNames(); 
        return view('codeteam', ['users' => $users]);
    }

    public function store(Request $request) {
        // Validate the request data (if needed)
        $request->validate([
            // Add validation rules here
        ]);

        // Create a new CodeTeam instance
        $codeTeam = new CodeTeam();

        // Assign values to the CodeTeam attributes based on form input names
        $codeTeam->code_team_leader = $request->input('code_team_leader');
        $codeTeam->code_team_co_leader = $request->input('code_team_co_leader') == -1 ? null : $request->input('code_team_co_leader');
        $codeTeam->recorder = $request->input('recorder');
        $codeTeam->code_team_member = $request->has('code_team_member') ? implode(',', $request->input('code_team_member')) : null;
        $codeTeam->intubated_by = $request->input('intubated_by') == -1 ? null : $request->input('intubated_by');

        // Save the CodeTeam instance to the database
        $codeTeam->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Response saved successfully');
    }
}
