<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\CodeBlueActivation;
use App\Models\Outcome;


class PdfController extends Controller
{
    public function download($code_number) {
        $event = CodeBlueActivation::with('patient')->where('code_number', $code_number)->firstOrFail();

        $outcome = Outcome::where('code_number', $event->code_number)->firstOrFail();

        $pdf = PDF::loadView('pdf', ['event' => $event, 'outcome' => $outcome]);

        return $pdf->download("code_event_{$event->code_number}.pdf");
    }
}
