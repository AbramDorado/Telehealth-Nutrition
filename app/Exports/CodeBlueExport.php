<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Illuminate\Support\Facades\DB;

class CodeBlueExport implements FromQuery, WithHeadings, ShouldAutoSize

{
    public function query()
    {
            return DB::table('code_blue_activations')
                ->leftJoin('patients', 'code_blue_activations.patient_pin', '=', 'patients.patient_pin')
                ->leftJoin('initial_resuscitations', 'code_blue_activations.code_number', '=', 'initial_resuscitations.code_number')
                ->leftJoin('outcomes', 'code_blue_activations.code_number', '=', 'outcomes.code_number')
                ->leftJoin('evaluations', 'code_blue_activations.code_number', '=', 'evaluations.code_number')
                ->leftJoin('code_teams', 'code_blue_activations.code_number', '=', 'code_teams.code_number')
                ->select(
                    'patients.patient_pin', 
                    'patients.visit_number',
                    'patients.age',
                    'patients.sex',
                    'patients.location',
                    'code_blue_activations.code_number',
                    'code_blue_activations.code_start_dt',
                    'code_blue_activations.arrest_dt',
                    'code_blue_activations.reason_for_activation',
                    'code_blue_activations.code_team_arrival_dt',
                    'code_blue_activations.e_cart_arrival_dt',
                    'code_blue_activations.witnessed',
                    'initial_resuscitations.first_documented_rhythm_dt',
                    'initial_resuscitations.first_pulseless_rhythm_dt',
                    'initial_resuscitations.compressions_dt',
                    'initial_resuscitations.breathing_upon_ca',
                    'initial_resuscitations.first_ventilation_dt',
                    'initial_resuscitations.intubation_dt',
                    'initial_resuscitations.first_pulseless_rhythm_dt',
                    'initial_resuscitations.intubation_attempts',
                    'outcomes.code_end_dt',
                    'outcomes.outcome',
                    'evaluations.question1',
                    'evaluations.question2',
                    'evaluations.question2_1',
                    'evaluations.question3',
                    DB::raw("NULLIF(CONCAT(
                        NULLIF(CASE WHEN evaluations.question3_1 = 'Absent' THEN 'IV Supplies, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_2 = 'Absent' THEN 'Central Line Kit, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_3 = 'Absent' THEN 'Suction, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_4 = 'Malfunctioning' THEN 'Medications, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_5 = 'Absent' THEN 'ECG Monitor, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_6 = 'Absent' THEN 'Defibrillator, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_7 = 'Absent' THEN 'External pacemaker, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_8 = 'Absent' THEN 'Pacing or defibrillator pad, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_9 = 'Absent' THEN 'Intubation supplies, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_10 = 'Absent' THEN 'Bag-valve mask, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_11 = 'Absent' THEN 'Oxygen supplies, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_12 = 'Absent' THEN 'Laboratory results, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_13 = 'Absent' THEN 'Chest x-ray, ' ELSE '' END, '')
                    ), '') AS Equipment_Absent"),
                    DB::raw("NULLIF(CONCAT(
                        NULLIF(CASE WHEN evaluations.question3_1 = 'Malfunctioning' THEN 'IV Supplies, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_2 = 'Malfunctioning' THEN 'Central Line Kit, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_3 = 'Malfunctioning' THEN 'Suction, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_4 = 'Malfunctioning' THEN 'Medications, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_5 = 'Malfunctioning' THEN 'ECG Monitor, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_6 = 'Malfunctioning' THEN 'Defibrillator, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_7 = 'Malfunctioning' THEN 'External pacemaker, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_8 = 'Malfunctioning' THEN 'Pacing or defibrillator pad, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_9 = 'Malfunctioning' THEN 'Intubation supplies, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_10 = 'Malfunctioning' THEN 'Bag-valve mask, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_11 = 'Malfunctioning' THEN 'Oxygen supplies, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_12 = 'Malfunctioning' THEN 'Laboratory results, ' ELSE '' END, ''),
                        NULLIF(CASE WHEN evaluations.question3_13 = 'Malfunctioning' THEN 'Chest x-ray, ' ELSE '' END, '')
                    ), '') AS Equipment_Malfunctioning"),
                    'evaluations.question3_14',
                    'evaluations.question4',
                    'evaluations.question4_1',
                    'evaluations.question5',
                    'evaluations.question5_1',
                    'evaluations.question6',
                    'evaluations.question7',
                    'code_teams.code_team_leader',
                    DB::raw('CASE WHEN code_teams.intubated_by = \'-1\' THEN \'N/A\' ELSE CAST(code_teams.intubated_by AS VARCHAR) END AS intubated_by'),
                    'code_teams.recorder'
                    )
                ->orderBy('code_blue_activations.code_number', 'asc');
    }

    public function headings(): array
    {
        return        
        ["PIN", "Visit/Encounter #", "Age", "Sex", "Location", 
        "Code Number","Date/Time Code Activation", "Date/Time of Arrest", "Reason for Code Blue Activation", "Date/Time code team arrival", "Date/Time e-cart arrival", "Witnessed", 
        "1st documented rhythm", "Date/time 1st pulseless rhythm", "Date/time compressions started", "breathing upon code activation", "date/time first assisted ventilation", "intubated date/time", "Number of intubation attempts",
        "Date/time resuscitation event ended", "Outcome",
        "Code Algorithm Followed", "Response Time Problem", "Response Time Remarks", "Equipment, supplies, tests Issues", "Equipment, supplies, tests Absent", "Equipment, supplies, tests Malfunctioning", "Equipment, supplies, tests Remarks",
        "Policies and Procedures Followed", "Policies and Procedures Remarks", "Problems during Code", "Problems during code Remarks", "Family updated", "Other Remarks",
        "Code Team Leader", "Intubated by", "Recorder"];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
}
 