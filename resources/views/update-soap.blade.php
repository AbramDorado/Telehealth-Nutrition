@extends('layouts.master')

@section('content')
<style>
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
          <h1 class="display-4">S.O.A.P.</h1>
          <p class="lead">S.O.A.P.</p>
        </div>
      </div>
    </div>
  </div>
</div>
            
<div class="fixed-header">
    <a class="btn btn-secondary" href="{{ route('patientinformation', ['patient_number' => $patient_number]) }}">Patient Information</a>
    <a class="btn btn-secondary" style="color: #fff; background-color: #6c757d" href="{{ route('soap', ['patient_number' => $patient_number]) }}">S.O.A.P.</a>
    <a class="btn btn-secondary" href="{{ route('labrequest', ['patient_number' => $patient_number]) }}">Lab Test Requests</a>
    <a class="btn btn-secondary" href="{{ route('diethistory', ['patient_number' => $patient_number]) }}">Diet History</a>
    <a class="btn btn-secondary" href="{{ route('pcwm', ['patient_number' => $patient_number]) }}">P.C.W.M.</a>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    
    <form method="POST" action="{{ route('update_soap', ['log_id' => $soap->soap_id]) }}">
    @csrf

    <div class="card">
        <div class="card-header bg-secondary text-white py-2">Details of Visit</div>
        <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="soap_dt">Date of Visit:</label>
                    <input type="date" class="form-control" name="soap_dt" value="{{ old('soap_dt', optional($soap)->soap_dt ? \Carbon\Carbon::parse($soap->soap_dt)->format('Y-m-d') : '') }}">
                </div>
            </div>

            <div class="col-md-10">
                <div class="form-group">
                    <label for="subjective">Subjective / Chief Complaint:</label>
                    <input type="text" class="form-control" name="subjective" placeholder="Reason for Visit?" value="{{ old('subjective', optional($soap ?? '')->subjective) }}">
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="card">
        <div class="card-header bg-secondary text-white py-2">Vital Signs & Measurements</div>
        <div class="card-body">
            <div class="row"> 
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="bp">Blood Pressure:</label>
                        <input type="text" class="form-control" name="bp" pattern="\d+/\d+" title="Please enter a valid BP in the format Systolic/Diastolic, e.g., 120/80" placeholder="Systolic/Diastolic" value="{{ old('bp', optional($soap ?? '')->bp) }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="pr">Pulse Rate (bpm):</label>
                        <input type="text" class="form-control" name="pr" pattern="^[1-9]\d*(\.\d{1})?$" value="{{ old('pr', optional($soap ?? '')->pr) }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="rr">Respiratory Rate:</label>
                        <input type="text" class="form-control" name="rr" pattern="^[1-9]\d*(\.\d{1})?$" value="{{ old('rr', optional($soap ?? '')->rr) }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="temp">Temperature (C):</label>
                        <input type="text" class="form-control" name="temp" pattern="^[1-9]\d*(\.\d{1})?$" title="Please enter a number, up to only one decimal place" value="{{ old('temp', optional($soap ?? '')->temp) }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="height">Height (cm):</label>
                        <input type="text" class="form-control" name="height" pattern="^[1-9]\d*(\.\d{1})?$" title="Please enter a number, up to only one decimal place" value="{{ old('height', optional($soap ?? '')->height) }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="weight">Weight (kg):</label>
                        <input type="text" class="form-control" name="weight" pattern="^[1-9]\d*(\.\d{1})?$" title="Please enter a number, up to only one decimal place" value="{{ old('weight', optional($soap ?? '')->weight) }}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="bmi_1">Body Mass Index:</label>
                        <input type="text" class="form-control" name="bmi_1" value="{{ old('bmi_1', optional($soap ?? '')->bmi_1) }}">
                    </div>
                </div>

            </div>
            

        </div>
    </div>

    <div class="card">
        <div class="card-header bg-secondary text-white py-2">Laboratory Test Results</div>
        <div class="card-body">
        <div class="row"> 
                <!-- First Column -->
                <div class="col-md-6">
                <div class="row"> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ecg">Electrocardiogram:</label>
                            <input type="text" class="form-control" name="ecg" value="{{ old('ecg', optional($soap ?? '')->ecg) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ecg">Chest X-Ray:</label>
                            <input type="text" class="form-control" name="cxr" value="{{ old('cxr', optional($soap ?? '')->cxr) }}">
                        </div>
                    </div>
                </div>

                <div class="row"> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cbc">Complete Blood Count:</label>
                            <input type="text" class="form-control" name="cbc" value="{{ old('cbc', optional($soap ?? '')->cbc) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ua">Urinalysis:</label>
                            <input type="text" class="form-control" name="ua" value="{{ old('ua', optional($soap ?? '')->ua) }}">
                        </div>
                    </div>
                </div>

                <div class="row"> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="crea">Creatinine:</label>
                            <input type="text" class="form-control" name="crea" value="{{ old('crea', optional($soap ?? '')->crea) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bun">Blood Urea Nitrogen:</label>
                            <input type="text" class="form-control" name="bun" value="{{ old('bun', optional($soap ?? '')->bun) }}">
                        </div>
                    </div>
                </div>

                <div class="row"> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bua">Blood Uric Acid:</label>
                            <input type="text" class="form-control" name="bua" value="{{ old('bua', optional($soap ?? '')->bua) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lipid_profile">Lipid Profile:</label>
                            <input type="text" class="form-control" name="lipid_profile" value="{{ old('lipid_profile', optional($soap ?? '')->lipid_profile) }}">
                        </div>
                    </div>
                </div>

                
                </div>

                <!-- Second Column -->
                <div class="col-md-6">
                
                    
                    <div class="row"> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sgot">SGOT:</label>
                                <input type="text" class="form-control" name="sgot" value="{{ old('sgot', optional($soap ?? '')->sgot) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sgpt">SGPT:</label>
                                <input type="text" class="form-control" name="sgpt" value="{{ old('sgpt', optional($soap ?? '')->sgpt) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row"> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fbs">Fasting Blood Sugar:</label>
                                <input type="text" class="form-control" name="fbs" value="{{ old('fbs', optional($soap ?? '')->fbs) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nak">Sodium and Potassium:</label>
                                <input type="text" class="form-control" name="nak" value="{{ old('nak', optional($soap ?? '')->nak) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row"> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hbaic">HbA1c:</label>
                                <input type="text" class="form-control" name="hbaic" value="{{ old('hbaic', optional($soap ?? '')->hbaic) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hepabs">HepaBS:</label>
                                <input type="text" class="form-control" name="hepabs" value="{{ old('hepabs', optional($soap ?? '')->hepabs) }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="others">Others:</label>
                        <input type="text" class="form-control" name="others" value="{{ old('others', optional($soap ?? '')->others) }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header card-header bg-secondary text-white py-2">Assessment & Plan</div>
        <div class="card-body">
            <div class="form-group">
                <label for="assessment">Assessment:</label>
                <input type="text" class="form-control" name="assessment" value="{{ old('assessment', optional($soap ?? '')->assessment) }}">
            </div>

            <div class="form-group">
                <label for="plan">Plan:</label>
                <input type="text" class="form-control" name="plan" value="{{ old('plan', optional($soap ?? '')->plan) }}">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 mt-2">
                <button type="submit" class="btn btn-block" style="background-color: #EC674A; border-color: #EC674A; font-size: 20px; padding: 15px 20px;">Save</button>
            </div>
        </div>
    </div>


</form> 

  </div>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('[name="height"]').on('blur change', function() {
            calculateBMI();
        });
        $('[name="weight"]').on('blur change', function() {
            calculateBMI();
        });
            
        function calculateBMI() {
            console.log("i am here")

            var heightInput = $('[name="height"]').val() / 100; 
            var weightInput = $('[name="weight"]').val();
            var bmiInput = $('[name="bmi_1"]');

            if (heightInput && weightInput) {
                var bmi = weightInput / (heightInput * heightInput)
                bmiInput.val(bmi.toFixed(2))
            } else {
                ageInput.val('');
            }
        }
    });
</script>

@endsection