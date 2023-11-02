<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    private $evaluation;

    public function index($code_number)
    {
        $questions = Evaluation::all(); // Replace 'Question' with your actual model
        return view('evaluation', compact('code_number'));
    } 

    public function store(Request $request, $code_number)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'question1' => 'sometimes|nullable|in:Yes,No',
            'question2' => 'sometimes|nullable|in:Yes,No',
            'question2_explanation' => 'sometimes|nullable|string',
            'question3' => 'sometimes|nullable|in:Yes,No',
            'question4' => 'sometimes|nullable|in:Yes,No',
            'question4_explanation' => 'sometimes|nullable|string',
            'question5' => 'sometimes|nullable|in:Yes,No',
            'question5_explanation' => 'sometimes|nullable|string',
            'question6' => 'sometimes|nullable|in:Yes,No',
            'question7_explanation' => 'sometimes|nullable|string',
            // Questions 3_1 to 3_14
            'question3_1' => 'sometimes|nullable',
            'question3_2' => 'sometimes|nullable',
            'question3_3' => 'sometimes|nullable',
            'question3_4' => 'sometimes|nullable',
            'question3_5' => 'sometimes|nullable',
            'question3_6' => 'sometimes|nullable',
            'question3_7' => 'sometimes|nullable',
            'question3_8' => 'sometimes|nullable',
            'question3_9' => 'sometimes|nullable',
            'question3_10' => 'sometimes|nullable',
            'question3_11' => 'sometimes|nullable',
            'question3_12' => 'sometimes|nullable',
            'question3_13' => 'sometimes|nullable',
            'question3_14' => 'sometimes|nullable',
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
        $evaluation->code_number =  $code_number;

        // Save the evaluation to the database
        $evaluation->save();

        return view('codeteam');
    }

}
