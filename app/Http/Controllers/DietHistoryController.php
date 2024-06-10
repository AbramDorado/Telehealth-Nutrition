<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DietHistory;
use App\Models\PatientInformation;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class DietHistoryController extends Controller
{
    private $diethistory;

    public function index($patient_number)
    {
        $diethistory = DietHistory::where('patient_number', $patient_number)
            ->orderBy('created_at', 'desc')
            ->first();
        return view('diethistory', compact('patient_number', 'diethistory'));
    }
    
    public function store(Request $request, $patient_number)
    {

        $existingDietHistory = DietHistory::where('patient_number', $patient_number)->first();

        if ($existingDietHistory) {
            return $this->updateDietHistory($request, $existingDietHistory, $patient_number);
        }
        $validated = $request->validate([
            'ht' => 'nullable|numeric',
            'wt' => 'nullable|numeric',
            'waist_cir' => 'nullable|numeric',
            'body_fat' => 'nullable|numeric',
            'bmi_2' => 'nullable|numeric',
            'dbw' => 'nullable|numeric',
            'dbw_range' => 'nullable|string|max:255',
            'case' => 'nullable|string',
            'diet_rx' => 'nullable|string',
            'food_recall_time' => 'nullable|date',
            'where_eaten' => 'nullable|string|max:255',
            'foods' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'amount' => 'nullable|string|max:255',
            'food_taken' => 'nullable|string|in:yes,no',
            'food_taken_1' => 'nullable|string|max:255',
            'exercise' => 'nullable|string|max:255',
            'target_weight_1' => 'nullable|numeric',
            'weight_loss' => 'nullable|numeric',
            'total_energy_allowance' => 'nullable|numeric',
            'vegetable_a' => 'nullable|string|max:255',
            'vegetable_b' => 'nullable|string|max:255',
            'fruit' => 'nullable|string|max:255',
            'milk' => 'nullable|string|max:255',
            'rice_cereal' => 'nullable|string|max:255',
            'meat' => 'nullable|string|max:255',
            'fat' => 'nullable|string|max:255',
            'sugar' => 'nullable|string|max:255',
        ]);

        $diethistory = new DietHistory();
        $diethistory->ht = $validated['ht'] ?? null;
        $diethistory->wt = $validated['wt'] ?? null;
        $diethistory->waist_cir = $validated['waist_cir'] ?? null;
        $diethistory->body_fat = $validated['body_fat'] ?? null;
        $diethistory->bmi_2 = $validated['bmi_2'] ?? null;
        $diethistory->dbw = $validated['dbw'] ?? null;
        $diethistory->dbw_range = $validated['dbw_range'] ?? null;
        $diethistory->case = $validated['case'] ?? null;
        $diethistory->diet_rx = $validated['diet_rx'] ?? null;
        $diethistory->food_recall_time = $validated['food_recall_time'] ?? null;
        $diethistory->where_eaten = $validated['where_eaten'] ?? null;
        $diethistory->foods = $validated['foods'] ?? null;
        $diethistory->description = $validated['description'] ?? null;
        $diethistory->amount = $validated['amount'] ?? null;
        $diethistory->food_taken = $validated['food_taken'] ?? null;
        $diethistory->food_taken_1 = $validated['food_taken_1'] ?? null;
        $diethistory->exercise = $validated['exercise'] ?? null;
        $diethistory->target_weight_1 = $validated['target_weight_1'] ?? null;
        $diethistory->weight_loss = $validated['weight_loss'] ?? null;
        $diethistory->total_energy_allowance = $validated['total_energy_allowance'] ?? null;
        $diethistory->vegetable_a = $validated['vegetable_a'] ?? null;
        $diethistory->vegetable_b = $validated['vegetable_b'] ?? null;
        $diethistory->fruit = $validated['fruit'] ?? null;
        $diethistory->milk = $validated['milk'] ?? null;
        $diethistory->rice_cereal = $validated['rice_cereal'] ?? null;
        $diethistory->meat = $validated['meat'] ?? null;
        $diethistory->fat = $validated['fat'] ?? null;
        $diethistory->sugar = $validated['sugar'] ?? null;

        $diethistory->patient_number = $patient_number;
        $diethistory->save();

        // return view('pcwm', ['patient_number' => $patient_number]);
        return redirect()->route('pcwm', ['patient_number' => $patient_number]);
    }

    public function updateDietHistory(Request $request, DietHistory $existingDietHistory, $patient_number)
    {
        $existingDietHistory->fill($request->all());
        $existingDietHistory->save();
        
        // Redirect the user back to the next page
        // return view('pcwm', ['patient_number' => $patient_number]);
        return redirect()->route('pcwm', ['patient_number' => $patient_number]);
    }
}