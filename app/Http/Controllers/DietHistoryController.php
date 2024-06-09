<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DietHistory;
use App\Models\PatientInformation;

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

        $dietHistory = new DietHistory();
        $dietHistory->ht = $validated['ht'] ?? null;
        $dietHistory->wt = $validated['wt'] ?? null;
        $dietHistory->waist_cir = $validated['waist_cir'] ?? null;
        $dietHistory->body_fat = $validated['body_fat'] ?? null;
        $dietHistory->bmi_2 = $validated['bmi_2'] ?? null;
        $dietHistory->dbw = $validated['dbw'] ?? null;
        $dietHistory->dbw_range = $validated['dbw_range'] ?? null;
        $dietHistory->case = $validated['case'] ?? null;
        $dietHistory->diet_rx = $validated['diet_rx'] ?? null;
        $dietHistory->food_recall_time = $validated['food_recall_time'] ?? null;
        $dietHistory->where_eaten = $validated['where_eaten'] ?? null;
        $dietHistory->foods = $validated['foods'] ?? null;
        $dietHistory->description = $validated['description'] ?? null;
        $dietHistory->amount = $validated['amount'] ?? null;
        $dietHistory->food_taken = $validated['food_taken'] ?? null;
        $dietHistory->food_taken_1 = $validated['food_taken_1'] ?? null;
        $dietHistory->exercise = $validated['exercise'] ?? null;
        $dietHistory->target_weight_1 = $validated['target_weight_1'] ?? null;
        $dietHistory->weight_loss = $validated['weight_loss'] ?? null;
        $dietHistory->total_energy_allowance = $validated['total_energy_allowance'] ?? null;
        $dietHistory->vegetable_a = $validated['vegetable_a'] ?? null;
        $dietHistory->vegetable_b = $validated['vegetable_b'] ?? null;
        $dietHistory->fruit = $validated['fruit'] ?? null;
        $dietHistory->milk = $validated['milk'] ?? null;
        $dietHistory->rice_cereal = $validated['rice_cereal'] ?? null;
        $dietHistory->meat = $validated['meat'] ?? null;
        $dietHistory->fat = $validated['fat'] ?? null;
        $dietHistory->sugar = $validated['sugar'] ?? null;

        $dietHistory->patient_number = $patient_number;
        $dietHistory->save();

        return view('pcwm', ['patient_number' => $patient_number]);
    }

    public function updateDietHistory(Request $request, DietHistory $existingDietHistory, $patient_number)
    {
        $existingDietHistory->fill($request->all());
        $existingDietHistory->save();
        
        return view('pcwm', ['patient_number' => $patient_number]);
    }
}