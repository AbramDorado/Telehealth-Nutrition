@extends('layouts.master')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Your Page Title</title>
    <!-- Other head elements if any -->
</head>
<body>
    <!-- Your page content goes here -->

    <!-- Your JavaScript includes go here -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Other script includes, if any -->

    <!-- Your JavaScript code goes here -->
    <script>
        // Include the CSRF token in your AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Your existing JavaScript code here
    </script>
</body>
</html>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="..." crossorigin="anonymous" />
<style>
    /* Style for the floating container */
    .floating-container {
        position: fixed;
        top: 200px; /* Adjust as needed */
        left: 0px; /* Adjust as needed */
        z-index: 1000;
    }

    /* Style for the timer container */
    .timer-container {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: 8px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        cursor: move;
        position: absolute; /* Ensure the position is absolute */
        transition: box-shadow 0.3s ease-in-out; /* Smooth transition for box-shadow */
    }

    /* Style for indicating draggable on hover */
    .timer-container:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    /* Style for the timer header */
    .timer-header {
        font-size: 20px;
        margin-bottom: 10px;
        text-align: center;
    }

    /* Style for the elapsed time */
    .elapsed-time {
        font-size: 24px;
        text-align: center;
        margin-bottom: 15px;
    }

    /* Style for the timer buttons */
    .timer-buttons {
        display: flex;
        justify-content: center;
    }

    /* Style for the individual timer buttons */
    .timer-button {
        padding: 8px 15px;
        margin: 0 5px;
        font-size: 14px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    /* Style for the button hover effect */
    .timer-button:hover {
        background-color: #e0e0e0;
    }

    #patientPinDropdown {
        position: absolute;
        z-index: 1000; /* Adjust the z-index as needed to ensure it's above other elements */
        width: 90%; /* Set the width to match the input field */
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
    }

    .question-mark-btn {
        position: fixed;
        bottom: 20px; /* Adjust the distance from the bottom */
        right: 20px; /* Adjust the distance from the right */
        z-index: 1000; /* Ensure it's above other elements */
    }

    #dropdownMenuButton{
        position: fixed;
        top: 100px; /* Adjust the distance from the bottom */
        left: 20px; /* Adjust the distance from the right */
        z-index: 1000; /* Ensure it's above other elements */
    }

    .fixed-header {
            display: flex;
            text-align: center;
            justify-content: center;
            align-content: center;
            position: fixed;
            top: 70px; /* Adjust as needed based on your header height */
            left: 0;
            right: 0;
            z-index: 1;
            background-color: #ECECF1; /* Adjust background color if needed */
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .fixed-header a.btn {
            width: 16%;
            margin-left: 5px; /* Adjust spacing between buttons */
        }

        .fixed-header a.btn.btn-secondary {
            background-color: #ECECF1;
            color: #000; /* Text color */
            border-color: #ECECF1; /* Border color */
        }

        .custom-btn {
            margin-right: 5px; 
        }


    </style>

<button type="button" class="btn btn-primary question-mark-btn" data-toggle="modal" data-target="#jumbotronModal">
  ?
</button>

<!-- Modal -->
<div class="modal fade" id="jumbotronModal" tabindex="-1" role="dialog" aria-labelledby="jumbotronModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="jumbotron">
  <h1 class="display-10">Lab Test Requests</h1>
  <p class="lead">Lab Test Requests</p>
        </div>
      </div>
    </div>
  </div>
</div>
            
<div class="fixed-header">
    <a class="btn btn-secondary" href="{{ route('patientinformation', ['patient_number' => $patient_number]) }}">Patient Information</a>
    <a class="btn btn-secondary" href="{{ route('soap', ['patient_number' => $patient_number]) }}">S.O.A.P.</a>
    <a class="btn btn-secondary" style="color: #fff; background-color: #6c757d" href="{{ route('labrequest', ['patient_number' => $patient_number]) }}">Lab Test Requests</a>
    <a class="btn btn-secondary" href="{{ route('diethistory', ['patient_number' => $patient_number]) }}">Diet History</a>
    <a class="btn btn-secondary" href="{{ route('pcwm', ['patient_number' => $patient_number]) }}">P.C.W.M.</a>
</div>

<div id="formContainer">
    <form id="baseForm" method="POST" action="{{ route('store_labrequest', ['patient_number' => $patient_number ?? '']) }}"> 
        @csrf
    
        <input type="hidden" name="labrequest_id" id="labrequest_id" value="">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                
            <div class="card">
                <div class="card-header bg-secondary text-white py-2">Laboratory Request Form</div>
                <div class="card-body">
                    <div class="form-group">
                    <label for="request">Request for:</label>
                    <div id="request">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="checkbox" name="request[]" value="Hypertension" {{ in_array('Hypertension', $request ?? []) ? 'checked' : ''}}>
                            <label for="cbc-checkbox">Complete Blood Count</label> 
                        </div>
                        <div class="col-md-3">
                            <input type="checkbox" name="request[]" value="Urinalysis" {{ in_array('Urinalysis', $request ?? []) ? 'checked' : ''}}>
                            <label for="ua-checkbox">Urinalysis</label> 
                        </div>
                        <div class="col-md-3">
                            <input type="checkbox" name="request[]" value="Electrocardiogram" {{ in_array('Electrocardiogram', $request ?? []) ? 'checked' : ''}}>
                            <label for="ecg-checkbox">Electrocardiogram</label> 
                        </div>
                        <div class="col-md-3">
                            <input type="checkbox" name="request[]" value="Chest X-Ray" {{ in_array('Chest X-Ray', $request ?? []) ? 'checked' : ''}}>
                            <label for="cxr-checkbox">Chest X-Ray</label> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="checkbox" name="request[]" value="Lipid Profile" {{ in_array('Lipid Profile', $request ?? []) ? 'checked' : ''}}>
                            <label for="lipid-profile-checkbox">Lipid Profile</label> 
                        </div>
                        <div class="col-md-3">
                            <input type="checkbox" name="request[]" value="Blood Urea Nitrogen" {{ in_array('Blood Urea Nitrogen', $request ?? []) ? 'checked' : ''}}>
                            <label for="bun-checkbox">Blood Urea Nitrogen</label> 
                        </div>
                        <div class="col-md-3">
                            <input type="checkbox" name="request[]" value="Creatinine" {{ in_array('Creatinine', $request ?? []) ? 'checked' : ''}}>
                            <label for="crea-checkbox">Creatinine</label> 
                        </div>
                        <div class="col-md-3">
                            <input type="checkbox" name="request[]" value="Blood Uric Acid" {{ in_array('Blood Uric Acid', $request ?? []) ? 'checked' : ''}}>
                            <label for="bua-checkbox">Blood Uric Acid</label> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="checkbox" name="request[]" value="SGOT" {{ in_array('SGOT', $request ?? []) ? 'checked' : ''}}>
                            <label for="sgot-checkbox">SGOT</label> 
                        </div>
                        <div class="col-md-3">
                            <input type="checkbox" name="request[]" value="SGPT" {{ in_array('SGPT', $request ?? []) ? 'checked' : ''}}>
                            <label for="sgpt-checkbox">SGPT</label> 
                        </div>
                        <div class="col-md-3">
                            <input type="checkbox" name="request[]" value="Potassium Blood Test" {{ in_array('Potassium Blood Test', $request ?? []) ? 'checked' : ''}}>
                            <label for="nak-checkbox">Potassium Blood Test</label> 
                        </div>
                        <div class="col-md-3">
                            <input type="checkbox" name="request[]" value="Fasting Blood Sugar" {{ in_array('Fasting Blood Sugar', $request ?? []) ? 'checked' : ''}}>
                            <label for="fbs-disease-checkbox">Fasting Blood Sugar</label> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="checkbox" name="request[]" value="HbA1C" {{ in_array('HbA1C', $request ?? []) ? 'checked' : ''}}>
                            <label for="hbaic-disease-checkbox">HbA1C</label> 
                        </div>
                        <div class="col-md-3">
                            <label for="others">Others (specify):</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="others" value="{{ old('others', optional($labrequest ?? '')->others) }}"> 
                        </div>
                    </div>
                    </div>
                    </div>                    

                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="medical_officer">Medical Officer:</label>
                            <input type="text" class="form-control" name="medical_officer" value="{{ old('medical_officer', optional($labrequest ?? '')->medical_officer) }}"> 
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="license_num">License Number:</label>
                            <input type="text" class="form-control" name="license_num" pattern="\d+" title="Please enter only numbers" value="{{ old('license_num', optional($labrequest ?? '')->license_num) }}">
                        </div>
                    </div>
                </div>


                </div>
            </div>

                    <button type="submit" class="btn btn-primary btn-block" id="saveButton">Save</button>

                    </form>    
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection