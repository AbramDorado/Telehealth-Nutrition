<!-- resources/views/view_code_blue.blade.php -->
@extends('layouts.master')

@section('content')
    <!-- Display Main Information -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center" id="headingMain">
            <h2 class="mb-0">
                Main Information
            </h2>
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseMain" aria-expanded="true" aria-controls="collapseMain">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
        <div id="collapseMain" class="collapse show" aria-labelledby="headingMain">
            <div class="card-body">
                <div class="card">
                    <div class="card-header bg-secondary text-white py-2">Patient Information</div>
                    <div class="card-body">
                        <div class="row">


                            <!-- First Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Patient Visit/Encounter Number:</th>
                                            <td>{{ $patientInformation->referral_control_num ?? 'N/A'  }}</td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <th>Patient Name:</th>
                                            <td>{{ $patientInformation->first_name }} {{ $patientInformation->middle_name ?? ''  }} 
                                            {{ $patientInformation->last_name ?? ''  }}  {{ $patientInformation->suffix ?? ''  }}</td>
                                            
                                        </tr>
                                        <tr>
                                            <th>Date of Birth:</th>
                                            <td>{{ $patientInformation->birthday ?? 'N/A'  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Number:</th>
                                            <td>{{ $patientInformation->contact_number ?? 'N/A'  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Civil Status:</th>
                                            <td>{{ $patientInformation->civil_status ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Religion:</th>
                                            <td>{{ $patientInformation->religion ?? 'N/A'  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Home Address:</th>
                                            <td>{{ $patientInformation->home_address ?? 'N/A'  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Allergies:</th>
                                            <td>{{ $patientInformation->allergies ?? 'N/A'  }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>

                            <!-- Second Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Age:</th>
                                            <td>{{ $patientInformation->age ?? 'N/A'  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Sex:</th>
                                            <td>{{ $patientInformation->sex ?? 'N/A'  }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Blood Type</th>
                                            <td>{{ $patientInformation->blood_type ?? 'N/A'  }}</td>
                                        </tr>
                                        <tr>
                                            <th>Position:</th>
                                            <td>{{ $patientInformation->position ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Unit Assignment:</th>
                                            <td>{{ $patientInformation->unit_assignment ?? 'N/A' }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Bachelor's Degree:</th>
                                            <td>{{ $patientInformation->bachelor_degree ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date Entered Service:</th>
                                            <td>{{ $patientInformation->date_entered_service ? \Carbon\Carbon::parse($patientInformation->date_entered_service)->format('Y-m-d') : 'N/A' }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header bg-secondary text-white py-2">General Appearance & Condition</div>
                    <div class="card-body">
                        <div class="row">


                            <!-- First Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <th>Skin:</th>
                                        <td>{{ $patientInformation->skin ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Neck:</th>
                                        <td>{{ $patientInformation->neck ?? 'N/A' }}</td>
                                    </tr>               
                                    <tr>
                                        <th>Heart:</th>
                                        <td>{{ $patientInformation->heart ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Abdomen:</th>
                                        <td>{{ $patientInformation->abdomen ?? 'N/A' }}</td>
                                    </tr>     
                                    <tr>
                                        <th>Neurologic:</th>
                                        <td>{{ $patientInformation->neurologic ?? 'N/A' }}</td>
                                    </tr>
                                        
                                    </tbody>
                                </table>
                            </div>

                            <!-- Second Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Head, Eyes, Ears, Nose, Throat:</th>
                                            <td>{{ $patientInformation->heent ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Chest:</th>
                                            <td>{{ $patientInformation->chest ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Breast:</th>
                                            <td>{{ $patientInformation->breast ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Musculoskeletal:</th>
                                            <td>{{ $patientInformation->musculoskeletal ?? 'N/A' }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div> 

                <div class="card">
                    <div class="card-header bg-secondary text-white py-2">Medical History</div>
                    <div class="card-body">
                        <div class="row">

                            <!-- First Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>Past Medical History:</th>
                                        <td>{{ is_array($patientInformation->past_medical_history) ? implode(', ', $patientInformation->past_medical_history) : ($patientInformation->past_medical_history ?? 'N/A') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Operations:</th>
                                        <td>{{ $patientInformation->operations ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Previous Hospitalization:</th>
                                        <td>{{ $patientInformation->previous_hospitalization ?? 'N/A' }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Second Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <th>Current Medication:</th>
                                        <td>{{ $patientInformation->current_medication ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Family History:</th>
                                        <td>{{ $patientInformation->family_history ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Psychosocial History:</th>
                                        <td>{{ $patientInformation->psychosocial_history ?? 'N/A' }}</td>
                                    </tr>
                                        
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div> 

                @if ($patientInformation->sex == 'female')

                <div class="card">
                    <div class="card-header bg-secondary text-white py-2">Obstetric History</div>
                    <div class="card-body">
                        <div class="row">

                            <!-- First Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <th>Last Menstrual Period:</th>
                                        <td>{{ $patientInformation->lmp ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Menarche:</th>
                                        <td>{{ $patientInformation->menarche ?? 'N/A' }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <!-- Second Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <th>Obstetric Score:</th>
                                        <td>{{ $patientInformation->obstetric_score ?? 'N/A' }}</td>
                                    </tr>
                                        
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div> 

                @endif

            </div>
        </div>
    </div>  

    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    @foreach($soaps as $soap)

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center" id="headingVisit{{ $loop->iteration }}">
            <h2 class="mb-0">
                Visit {{ $loop->iteration }} : Subjective, Objective, Assessment, Plan
            </h2>
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseVisit{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapseVisit{{ $loop->iteration }}">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
        <div id="collapseVisit{{ $loop->iteration }}" class="collapse show" aria-labelledby="headingVisit{{ $loop->iteration }}">
            <div class="card-body">
            
            <div class="card">
                <div class="card-header bg-secondary text-white py-2">Details of Visit</div>
                <div class="card-body">
                    <div class="row">

                        <!-- First Column -->
                        <div class="col-md-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Date of Visit :</th>
                                        <td>{{ \Carbon\Carbon::parse($soap->soap_dt)->format('Y-m-d') ?? 'N/A' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Subjective / Chief Complaint:</th>
                                        <td>{{ $soap->subjective ?? 'N/A'  }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div> 

            <div class="card">
                <div class="card-header bg-secondary text-white py-2">Vital Signs & Measurements</div>
                <div class="card-body">
                    <div class="row">

                        <!-- First Column -->
                        <div class="col-md-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Blood Pressure:</th>
                                        <td>{{ $soap->bp ?? 'N/A'  }}</td>
                                    </tr>

                                    <tr>
                                        <th>Pulse Rate (bpm):</th>
                                        <td>{{ $soap->pr ?? 'N/A' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Respiratory Rate:</th>
                                        <td>{{ $soap->rr ?? 'N/A' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Temperature (C):</th>
                                        <td>{{ $soap->temp ?? 'N/A' }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Height (cm):</th>
                                        <td>{{ $soap->height ?? 'N/A' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Weight (kg):</th>
                                        <td>{{ $soap->weight ?? 'N/A' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Body Mass Index:</th>
                                        <td>{{ $soap->bmi_1 ?? 'N/A' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div> 

            <div class="card">
                <div class="card-header bg-secondary text-white py-2">Laboratory Test Results</div>
                <div class="card-body">
                    <div class="row">

                        <!-- First Column -->
                        <div class="col-md-12">
                            <table class="table">
                                <tbody>

                                    @if($soap->ecg)
                                    <tr>
                                        <th>Electocardiogram:</th>
                                        <td>{{ $soap->ecg ?? 'N/A'  }}</td>
                                    </tr>
                                    @endif

                                    @if($soap->cxr)
                                    <tr>
                                        <th>Chest X-Ray:</th>
                                        <td>{{ $soap->cxr ?? 'N/A' }}</td>
                                    </tr>
                                    @endif

                                    @if($soap->cbc)
                                    <tr>
                                        <th>Complete Blood Count:</th>
                                        <td>{{ $soap->cbc ?? 'N/A' }}</td>
                                    </tr>
                                    @endif

                                    @if($soap->ua)
                                    <tr>
                                        <th>Urinalysis:</th>
                                        <td>{{ $soap->ua ?? 'N/A' }}</td>
                                    </tr>
                                    @endif

                                    @if($soap->crea)
                                    <tr>
                                        <th>Creatinine:</th>
                                        <td>{{ $soap->crea ?? 'N/A' }}</td>
                                    </tr>
                                    @endif

                                    @if($soap->bun)
                                    <tr>
                                        <th>Blood Urea Nitrogen:</th>
                                        <td>{{ $soap->bun ?? 'N/A' }}</td>
                                    </tr>
                                    @endif

                                    @if($soap->bua)
                                    <tr>
                                        <th>Blood Uric Acid:</th>
                                        <td>{{ $soap->bua ?? 'N/A' }}</td>
                                    </tr>
                                    @endif

                                    @if($soap->lipid_profile)
                                    <tr>
                                        <th>Lipid Profile:</th>
                                        <td>{{ $soap->lipid_profile ?? 'N/A' }}</td>
                                    </tr>
                                    @endif

                                    @if($soap->sgot)
                                    <tr>
                                        <th>SGOT:</th>
                                        <td>{{ $soap->sgot ?? 'N/A' }}</td>
                                    </tr>
                                    @endif

                                    @if($soap->sgpt)
                                    <tr>
                                        <th>SGPT:</th>
                                        <td>{{ $soap->sgpt ?? 'N/A' }}</td>
                                    </tr>
                                    @endif

                                    @if($soap->fbs)
                                    <tr>
                                        <th>Fasting Blood Sugar:</th>
                                        <td>{{ $soap->fbs ?? 'N/A' }}</td>
                                    </tr>
                                    @endif

                                    @if($soap->nak)
                                    <tr>
                                        <th>Sodium and Potassium:</th>
                                        <td>{{ $soap->nak ?? 'N/A' }}</td>
                                    </tr>
                                    @endif

                                    @if($soap->hbaic)
                                    <tr>
                                        <th>HbA1c:</th>
                                        <td>{{ $soap->hbaic ?? 'N/A' }}</td>
                                    </tr>
                                    @endif

                                    @if($soap->hepabs)
                                    <tr>
                                        <th>HepaBS:</th>
                                        <td>{{ $soap->hepabs ?? 'N/A' }}</td>
                                    </tr>
                                    @endif

                                    @if($soap->others)
                                    <tr>
                                        <th>Others:</th>
                                        <td>{{ $soap->others ?? 'N/A' }}</td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div> 

            <div class="card">
                <div class="card-header bg-secondary text-white py-2">Assessment & Plan</div>
                <div class="card-body">
                    <div class="row">

                        <!-- First Column -->
                        <div class="col-md-12">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Assessment :</th>
                                        <td>{{ $soap->assessment ?? 'N/A'  }}</td>                                    </tr>
                                    <tr>
                                        <th>Plan:</th>
                                        <td>{{ $soap->plan ?? 'N/A'  }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div> 

        </div>
        </div>
    </div> 

    @endforeach

    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center" id="headingLabTestRequests">
            <h2 class="mb-0">Lab Test Requests</h2>
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseLabTestRequests" aria-expanded="true" aria-controls="collapseLabTestRequests">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
        <div id="collapseLabTestRequests" class="collapse show" aria-labelledby="headingLabTestRequests">
            <div class="card-body">

            <div class="card">
                <div class="card-header bg-secondary text-white py-2">Lab Request</div>
                <div class="card-body">
                    <div class="row">

                        <!-- First Column -->
                        <div class="col-md-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Medical Officer:</th>
                                        <td>{{ $labRequest->medical_officer ?? 'N/A'  }}</td>
                                    </tr>

                                    <tr>
                                        <th>License No:</th>
                                        <td>{{ $labRequest->license_num ?? 'N/A'  }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-6">
                            <table class="table">
                                <tbody>

                                    <tr>
                                        <th>Date of Last Update:</th>
                                        <td>{{ $labRequest->lab_request_dt ? \Carbon\Carbon::parse($labRequest->lab_request_dt)->format('Y-m-d') : 'N/A' }}</td> 
                                    </tr>

                                    @php
                                        $requestContents = json_decode($labRequest->request, true);
                                    @endphp
                                    <tr>
                                        <th>Requested Laboratories:</th>
                                        <td>
                                            @if($requestContents)
                                                {{ implode(', ', $requestContents) }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div> 

            </div>
        </div>
    </div>

    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center" id="headingDietHistory">
            <h2 class="mb-0">Diet History</h2>
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDietHistory" aria-expanded="true" aria-controls="collapseDietHistory">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
        <div id="collapseDietHistory" class="collapse show" aria-labelledby="headingDietHistory">
            <div class="card-body">
                <div class="card">
                    <div class="card-header bg-secondary text-white py-2">Anthromorphic Assessment</div>
                    <div class="card-body">
                        <div class="row">

                            <!-- First Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Height (cm):</th>
                                            <td>{{ $dietHistory->ht ?? 'N/A'  }}</td>
                                        </tr>

                                        <tr>
                                            <th>Weight (kg):</th>
                                            <td>{{ $dietHistory->wt ?? 'N/A'  }}</td>
                                        </tr>

                                        <tr>
                                            <th>Waist Circumference:</th>
                                            <td>{{ $dietHistory->waist_cir ?? 'N/A'  }}</td>
                                        </tr>

                                        <tr>
                                            <th>Body Fat:</th>
                                            <td>{{ $dietHistory->body_fat ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>BMI:</th>
                                            <td>{{ $dietHistory->bmi_2 ?? 'N/A' }}</td>
                                        </tr>
                                        

                                    </tbody>
                                </table>
                            </div>

                            <!-- Second Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>

                                        <tr>
                                            <th>DBW:</th>
                                            <td>{{ $dietHistory->dbw ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>DBW Range:</th>
                                            <td>{{ $dietHistory->dbw_range ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Case:</th>
                                            <td>{{ $dietHistory->case ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Diet Rx:</th>
                                            <td>{{ $dietHistory->diet_rx ?? 'N/A' }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-secondary text-white py-2">24 Hour Food Recall</div>
                    <div class="card-body">
                        <div class="row">

                            <!-- First Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>Food Recall Time:</th>
                                        <td>{{ $dietHistory->food_recall_time ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Where Eaten:</th>
                                        <td>{{ $dietHistory->where_eaten ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Foods:</th>
                                        <td>{{ $dietHistory->foods ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description:</th>
                                        <td>{{ $dietHistory->description ?? 'N/A' }}</td>
                                    </tr>                        

                                    </tbody>
                                </table>
                            </div>

                            <!-- Second Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>

                                        <tr>
                                            <th>Amount:</th>
                                            <td>{{ $dietHistory->amount ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Was the food taken typical?:</th>
                                            <td>
                                                {{ $dietHistory->food_taken ? ucfirst($dietHistory->food_taken) : 'N/A' }}@if($dietHistory->food_taken == 'no'), {{ $dietHistory->food_taken_1 ?? 'no explanation' }}@endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Exercise:</th>
                                            <td>{{ $dietHistory->exercise ?? 'N/A' }}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-secondary text-white py-2">Nutrition Intervention</div>
                    <div class="card-body">
                        <div class="row">

                            <!-- First Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <th>Target Weight:</th>
                                        <td>{{ $dietHistory->target_weight_1 ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Weight Loss:</th>
                                        <td>{{ $dietHistory->weight_loss ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Energy Allowance:</th>
                                        <td>{{ $dietHistory->total_energy_allowance ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Vegetable A:</th>
                                        <td>{{ $dietHistory->vegetable_a ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Vegetable B:</th>
                                        <td>{{ $dietHistory->vegetable_b ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fruit:</th>
                                        <td>{{ $dietHistory->fruit ?? 'N/A' }}</td>
                                    </tr>
                                    
                                    </tbody>
                                </table>
                            </div>

                            <!-- Second Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <th>Milk:</th>
                                        <td>{{ $dietHistory->milk ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Rice Cereal:</th>
                                        <td>{{ $dietHistory->rice_cereal ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Meat:</th>
                                        <td>{{ $dietHistory->meat ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fat:</th>
                                        <td>{{ $dietHistory->fat ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sugar:</th>
                                        <td>{{ $dietHistory->sugar ?? 'N/A' }}</td>
                                    </tr>
                                        
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center" id="headingProgressChart">
            <h2 class="mb-0">Progress Chart for Weight Management</h2>
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseProgressChart" aria-expanded="true" aria-controls="collapseProgressChart">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
        <div id="collapseProgressChart" class="collapse show" aria-labelledby="headingProgressChart">
            <div class="card-body">
                
                <div class="card">
                    <div class="card-header bg-secondary text-white py-2">Goals & Rules</div>
                    <div class="card-body">
                        <div class="row">

                            <!-- First Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <th>Target Weight:</th>
                                        <td>{{ $pcwm->target_weight_2 ?? 'N/A' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Target Date:</th>
                                        <td>{{ $pcwm->target_date ? \Carbon\Carbon::parse($dietHistory->target_date)->format('Y-m-d') : 'N/A' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Starting Weight:</th>
                                        <td>{{ $pcwm->starting_weight ?? 'N/A' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Starting Date:</th>
                                        <td>{{ $pcwm->starting_date ? \Carbon\Carbon::parse($dietHistory->starting_date)->format('Y-m-d') : 'N/A' }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <!-- Second Column -->
                            <div class="col-md-6">
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <th>Weighing Day:</th>
                                        <td>{{ $pcwm->weighing_day ? ucfirst($pcwm->weighing_day) : 'N/A' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Weighing Time:</th>
                                        <td>{{ $pcwm->weighing_time ?? 'N/A' }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-secondary text-white py-2">Weekly Logs</div>
                    <div class="card-body">
                        <div class="row">

                        @foreach($pcwmlogs as $pcwmlog)

                            <!-- First Column -->
                            <div class="col-md-3">
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <th>Date:</th>
                                        <td>{{ $pcwmlog->pcwm2_dt ? \Carbon\Carbon::parse($pcwmlog->pcwm2_dt)->format('Y-m-d') : 'N/A' }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-3">
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <th>Weight:</th>
                                        <td>{{ $pcwmlog->actual_weekly_weight ?? 'N/A' }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-3">
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <th>Gain:</th>
                                        <td>{{ $pcwmlog->gain ?? 'N/A' }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <!-- Second Column -->
                            <div class="col-md-3">
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <th>Loss:</th>
                                        <td>{{ $pcwmlog->loss ?? 'N/A' }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    

@endsection
