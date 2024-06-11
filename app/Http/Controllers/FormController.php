<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientInformation;
use App\Models\Soap;
use App\Models\LabRequest;
use App\Models\DietHistory;
use App\Models\Pcwm;
use App\Models\PcwmLog;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FormController extends Controller
{
    // VIEW FUNCTION IN CASE IN THE FUTURE
    public function viewMedicalRecord($patient_number)
    {
        // Fetch information from each table based on the patient_number
        $patientInformation = PatientInformation::where('patient_number', $patient_number)->first();
        $soaps = Soap::where('patient_number', $patient_number)->get();
        $labRequest = LabRequest::where('patient_number', $patient_number)->first();
        $dietHistory = DietHistory::where('patient_number', $patient_number)->first();
        $pcwm = Pcwm::where('patient_number', $patient_number)->first();
        $pcwmlogs = PcwmLog::where('pcwm_id', $pcwm->pcwm_id)->orderBy('pcwm2_dt', 'asc')->get();;

        // Pass the data to the view
        return view('view_medical_record', compact('patientInformation', 'soaps', 'labRequest', 'dietHistory', 'pcwm', 'pcwmlogs'));
    }

    // SHOW TABLE FUNCTION
    public function index()
    {
        $nutritionEvents = DB::table('patient_information')
            ->leftJoin('lab_requests', function ($join) {
                $join->on('patient_information.patient_number', '=', DB::raw('lab_requests.patient_number::bigint'));
            })
            ->select(
                'patient_information.patient_number',
                'patient_information.first_name',
                'patient_information.last_name',
                'patient_information.age',
                'patient_information.sex',
                'patient_information.contact_number',
                'lab_requests.request'
            )
            ->distinct()
            ->get();
    
        // Format the requests
        $nutritionEvents->transform(function ($event) {
            if (isset($event->request)) {
                $requests = json_decode($event->request, true);
                $event->request = $requests ? implode(', ', $requests) : 'None';
            } else {
                $event->request = 'None';
            }
            return $event;
        });
    
        return view('includes.nutritionforms', compact('nutritionEvents'));
    }    
}