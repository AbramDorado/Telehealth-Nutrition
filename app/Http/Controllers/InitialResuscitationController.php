<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\InitialResuscitation;

class InitialResuscitationController extends Controller
{
    private $initialResuscitation;

    public function index()
    {   
        return view('initialresuscitation');
    }

    public function firstVenitlationDT(Request $request)
    {
        $time = $request->input('time');
        $carbonTime = Carbon::parse($time);

        $initialResuscitation = new InitialResuscitation();
        $initialResuscitation->first_ventilation_dt = $carbonTime;
        $initialResuscitation->save();
    }

    public function intubationDT(Request $request)
    {
        $time = $request->input('time');
        $carbonTime = Carbon::parse($time);

        $initialResuscitation = new InitialResuscitation();
        $initialResuscitation->intubation_dt = $carbonTime;
        $initialResuscitation->save();
    }

    public function firstPulselessRhythmDT(Request $request)
    {
        $time = $request->input('time');
        $carbonTime = Carbon::parse($time);

        $initialResuscitation = new InitialResuscitation();
        $initialResuscitation->first_pulseless_rhythm_dt= $carbonTime;
        $initialResuscitation->save();
    }

    public function compressionsDT(Request $request)
    {
        $time = $request->input('time');
        $carbonTime = Carbon::parse($time);

        $initialResuscitation = new InitialResuscitation();
        $initialResuscitation->compressions_dt= $carbonTime;
        $initialResuscitation->save();
    }

    public function aedAppliedDT(Request $request)
    {
        $time = $request->input('time');
        $carbonTime = Carbon::parse($time);

        $initialResuscitation = new InitialResuscitation();
        $initialResuscitation->aed_applied_dt= $carbonTime;
        $initialResuscitation->save();
    }

    public function pacemakerOnDT(Request $request)
    {
        $time = $request->input('time');
        $carbonTime = Carbon::parse($time);

        $initialResuscitation = new InitialResuscitation();
        $initialResuscitation->pacemaker_on_dt= $carbonTime;
        $initialResuscitation->save();
    }

}
