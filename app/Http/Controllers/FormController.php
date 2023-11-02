<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class FormController extends Controller
{
    public function index()
    {
        // Retrieve resuscitation events from the patients table
        $resuscitationEvents = Patient::select('patient_pin', 'created_at', 'location', 'first_name', 'last_name')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('includes/codeblueforms', compact('resuscitationEvents'));
    }
}
