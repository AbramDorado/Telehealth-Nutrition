<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\CodeBlueActivation;
use App\Models\Outcome;
use App\Models\InitialResuscitation;
use App\Models\Flowsheet;
use App\Models\Evaluation;
use App\Models\CodeTeam;


class PdfController extends Controller
{
    public function download($code_number) {
        $event = CodeBlueActivation::with('patient')->where('code_number', $code_number)->first();

        $initialResuscitation = InitialResuscitation::where('code_number', $event->code_number)->first();
         
        $flowsheet = Flowsheet::where('code_number', $event->code_number)->distinct()->get();
        
        $outcome = Outcome::where('code_number', $event->code_number)->first();

        $evaluation = Evaluation::where('code_number', $event->code_number)->first();

        $codeTeam = CodeTeam::where('code_number', $event->code_number)->first();

        $pdf = PDF::loadView('pdf', ['event' => $event, 'initialResuscitation' => $initialResuscitation, 'flowsheet' => $flowsheet, 'outcome' => $outcome, 'evaluation' => $evaluation, 'codeTeam' => $codeTeam]);


        return $pdf->download("code_event_{$event->code_number}.pdf");
    }
}
