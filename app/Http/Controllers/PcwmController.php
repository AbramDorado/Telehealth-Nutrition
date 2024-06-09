<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pcwm;
use App\Models\PcwmLog;

class PcwmController extends Controller
{
    public function index($patient_number)
    {
        $pcwm = Pcwm::where('patient_number', $patient_number)->with('logs')->first();
        return view('pcwm', compact('pcwm', 'patient_number'));
    }

    public function store(Request $request, $patient_number)
    {
        $pcwm = Pcwm::updateOrCreate(
            ['patient_number' => $patient_number],
            $request->only([
                'target_weight_2',
                'target_date',
                'starting_weight',
                'starting_date',
                'weighing_day',
                'weighing_time',
            ])
        );

        $logData = [];
        foreach ($request->input('pcwm2_dt', []) as $index => $date) {
            $logData[] = new PcwmLog([
                'pcwm2_dt' => $date,
                'actual_weekly_weight' => $request->input('weight')[$index],
                'loss' => $request->input('loss')[$index],
                'gain' => $request->input('gain')[$index],
            ]);
        }
        $pcwm->logs()->delete();
        $pcwm->logs()->saveMany($logData);

        return redirect()->route('includes/nutritionforms', ['patient_number' => $patient_number]);
    }
}