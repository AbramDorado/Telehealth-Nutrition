<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    private $evaluation;

    public function index()
    {
        $questions = Evaluation::all(); // Replace 'Question' with your actual model
        return view('evaluation', compact('evaluation'));
    } 

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'question1' => 'required|in:Yes,No',
            'question2' => 'required|in:Yes,No',
            'question2_explanation' => 'nullable|string',
            'question3' => 'required|in:Yes,No',
            'question3_1' => 'required',
            'question3_2' => 'required',
            'question3_3' => 'required',
            'question3_4' => 'required',
            'question3_5' => 'required',
            'question3_6' => 'required',
            'question3_7' => 'required',
            'question3_8' => 'required',
            'question3_9' => 'required',
            'question3_10' => 'required',
            'question3_11' => 'required',
            'question3_12' => 'required',
            'question3_13' => 'required',
            'question3_14' => 'nullable',
            'question4' => 'required|in:Yes,No',
            'question4_explanation' => 'nullable|string',
            'question5' => 'required|in:Yes,No',
            'question5_explanation' => 'nullable|string',
            'question6' => 'required|in:Yes,No',
            'question7_explanation' => 'nullable|string',
        ]);

        // Create a new Evaluation model instance and fill it with the user's responses
        $evaluation = new Evaluation();
        $evaluation->question1 = $validatedData['question1'];
        $evaluation->question2 = $validatedData['question2'];
        $evaluation->question2_1 = $validatedData['question2_explanation'];
        $evaluation->question3 = $validatedData['question3'];
        $evaluation->question3_1 = $validatedData['question3_1'];
        $evaluation->question3_2 = $validatedData['question3_2'];
        $evaluation->question3_3 = $validatedData['question3_3'];
        $evaluation->question3_4 = $validatedData['question3_4'];
        $evaluation->question3_5 = $validatedData['question3_5'];
        $evaluation->question3_6 = $validatedData['question3_6'];
        $evaluation->question3_7 = $validatedData['question3_7'];
        $evaluation->question3_8 = $validatedData['question3_8'];
        $evaluation->question3_9 = $validatedData['question3_9'];
        $evaluation->question3_10 = $validatedData['question3_10'];
        $evaluation->question3_11 = $validatedData['question3_11'];
        $evaluation->question3_12 = $validatedData['question3_12'];
        $evaluation->question3_13 = $validatedData['question3_13'];
        $evaluation->question3_14 = $validatedData['question3_14'];
        $evaluation->question4 = $validatedData['question4'];
        $evaluation->question4_1 = $validatedData['question4_explanation'];
        $evaluation->question5 = $validatedData['question5'];
        $evaluation->question5_1 = $validatedData['question5_explanation'];
        $evaluation->question6 = $validatedData['question6'];
        $evaluation->question7 = $validatedData['question7_explanation'];

        // Save the evaluation to the database
        $evaluation->save();

        return view('codeteam');
    }

}
