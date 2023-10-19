<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outcome;

class OutcomeController extends Controller
{
    private $outcome;

    public function index()
    {   
        return view('outcome');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'outcome' => 'required', // Adjust validation rules as needed
        ]);

        // Create a new Outcome instance and populate its fields
        $outcome = new Outcome();
        $outcome->outcome = $request->input('outcome');

        if ($request->input('outcome') === 'Died - efforts terminated; no sustained return of circulation' || $request->input('outcome') === 'Died - with Advanced Directives/DNR in place') {
            $request->validate([
                'death_dt' => 'required|date', // Validate the death date and time
            ]);

            $outcome->death_dt = $request->input('death_dt');
        } elseif ($request->input('outcome') === 'Survived - Return of Spontaneous Circulation') {
            $request->validate([
                'bp_systolic' => 'required|integer', // Validate the blood pressure fields
                'bp_diastolic' => 'required|integer',
                'heart_rate' => 'required|integer',
                'respiratory_rate' => 'required|integer',
                'rhythm' => 'required', // You may want to define validation rules for rhythm options
            ]);

            $outcome->bp_systolic = $request->input('bp_systolic');
            $outcome->bp_diastolic = $request->input('bp_diastolic');
            $outcome->heart_rate = $request->input('heart_rate');
            $outcome->respiratory_rate = $request->input('respiratory_rate');
            $outcome->rhythm = $request->input('rhythm');
        }

        // Save the outcome to the database
        $outcome->save();

        // Redirect to a success page or perform any other actions
        return redirect()->route('outcome.index')->with('success', 'Outcome recorded successfully.');
    }
}
