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
    /* Add this CSS to style the disabled buttons */
    .fixed-header a.btn.btn-secondary.disabled {
        pointer-events: none; /* Disable click events */
        opacity: 0.6; /* Reduce opacity to visually indicate disabled state */
        cursor: not-allowed; /* Change cursor to indicate not allowed */
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
          <h1 class="display-4">Patient Information</h1>
          <p class="lead">Patient Information</p>
        </div>
      </div>
    </div>
  </div>
</div>
            
<div class="fixed-header">
    <a class="btn btn-secondary" style="color: #fff; background-color: #6c757d" href="{{ route('patientinformation', ['patient_number' => $patient_number]) }}">Patient Information</a>
    <a id="soapBtn" class="btn btn-secondary disabled" href="{{ route('soap', ['patient_number' => $patient_number]) }}" >S.O.A.P.</a>
    <a id="labrequestBtn" class="btn btn-secondary disabled" href="{{ route('labrequest', ['patient_number' => $patient_number]) }}" >Lab Test Requests</a>
    <a id="diethistoryBtn" class="btn btn-secondary disabled" href="{{ route('diethistory', ['patient_number' => $patient_number]) }}" >Diet History</a>
    <a id="pcwmBtn" class="btn btn-secondary disabled" href="{{ route('pcwm', ['patient_number' => $patient_number]) }}" >P.C.W.M.</a>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    
    <form method="POST" action="{{ route('store_patientinformation', ['patient_number' => $patient_number]) }}"> <!--start of the form submission-->
        @csrf

    <div class="card">
    <div class="card-header bg-secondary text-white py-2">Patient Information</div>
    <div class="card-body">
        <div class="row">
            <!-- First Column -->
            <div class="col-md-6">

                <div class="form-group">
                    <label for="referral_control_num">Referral Control Number:</label>
                    <input type="text" class="form-control" name="referral_control_num" placeholder="e.g. 123456789" pattern="\d+" title="Please enter only numbers" value="{{ old('referral_control_num', optional($patientinformation ?? '')->referral_control_num) }}">
                </div>

                <label for="patient_name">Patient Name:</label>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name', optional($patientinformation ?? '')->first_name) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name', optional($patientinformation ?? '')->last_name) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="{{ old('middle_name', optional($patientinformation ?? '')->middle_name) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="suffix" placeholder="Suffix" value="{{ old('suffix', optional($patientinformation ?? '')->suffix) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birthday">Date of Birth:</label>
                            <input type="date" class="form-control" name="birthday" value="{{ old('birthday', optional($patientinformation ?? '')->birthday) }}" oninput="calculateAge()">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" class="form-control" name="age" placeholder="e.g. 21" value="{{ old('age', optional($patientinformation ?? '')->age) }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="home_address">Home Address:</label>
                    <input type="text" class="form-control" name="home_address" placeholder="Current Address" value="{{ old('home_address', optional($patientinformation ?? '')->home_address) }}">
                </div>

                <div class="form-group">
                    <label for="blood_type">Blood Type:</label>
                    <select class="form-control" name="blood_type">
                        <option value="">Select blood type</option>
                        <option value="A+" {{ old('blood_type', optional($patientinformation ?? '')->blood_type) === 'A+' ? 'selected' : '' }}>A+</option>
                        <option value="A-" {{ old('blood_type', optional($patientinformation ?? '')->blood_type) === 'A-' ? 'selected' : '' }}>A-</option>
                        <option value="B+" {{ old('blood_type', optional($patientinformation ?? '')->blood_type) === 'B+' ? 'selected' : '' }}>B+</option>
                        <option value="B-" {{ old('blood_type', optional($patientinformation ?? '')->blood_type) === 'B-' ? 'selected' : '' }}>B-</option>
                        <option value="AB+" {{ old('blood_type', optional($patientinformation ?? '')->blood_type) === 'AB+' ? 'selected' : '' }}>AB+</option>
                        <option value="AB-" {{ old('blood_type', optional($patientinformation ?? '')->blood_type) === 'AB-' ? 'selected' : '' }}>AB-</option>
                        <option value="O+" {{ old('blood_type', optional($patientinformation ?? '')->blood_type) === 'O+' ? 'selected' : '' }}>O+</option>
                        <option value="O-" {{ old('blood_type', optional($patientinformation ?? '')->blood_type) === 'O-' ? 'selected' : '' }}>O-</option>
                    </select>
                </div>
                
            </div>

            <!-- Second Column -->
            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact_number">Contact Number:</label>
                            <input type="text" class="form-control" name="contact_number" placeholder="e.g. 9953425699" pattern="\d+" title="Please enter only numbers" value="{{ old('contact_number', optional($patientinformation ?? '')->contact_number) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="religion">Religion:</label>
                            <input type="text" class="form-control" name="religion" placeholder="e.g. Catholic, Born Again, etc." value="{{ old('religion', optional($patientinformation ?? '')->religion) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="civil_status">Civil Status:</label>
                            <select class="form-control" name="civil_status">
                                <option value="">Select Civil Status</option>
                                <option value="married" {{ old('civil_status', optional($patientinformation ?? '')->civil_status) === 'married' ? 'selected' : '' }}>Married</option>
                                <option value="single" {{ old('civil_status', optional($patientinformation ?? '')->civil_status) === 'single' ? 'selected' : '' }}>Single</option>
                                <option value="divorced" {{ old('civil_status', optional($patientinformation ?? '')->civil_status) === 'divorced' ? 'selected' : '' }}>Divorced</option>
                                <option value="widowed" {{ old('civil_status', optional($patientinformation ?? '')->civil_status) === 'widowed' ? 'selected' : '' }}>Widowed</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sex">Sex:</label>
                            <select class="form-control" name="sex">
                                <option value="">Select a sex</option>
                                <option value="male" {{ old('sex', optional($patientinformation ?? '')->sex) === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('sex', optional($patientinformation ?? '')->sex) === 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('sex', optional($patientinformation ?? '')->sex) === 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="unit_assignment">Unit Assignment: </label>
                            <input type="text" class="form-control" name="unit_assignment" placeholder="e.g. Rescue Squad" value="{{ old('unit_assignment', optional($patientinformation ?? '')->unit_assignment) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position">Rank/Position: </label>
                            <input type="text" class="form-control" name="position" placeholder="e.g. Fire Captain" value="{{ old('position', optional($patientinformation ?? '')->position) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bachelor_degree">Bachelor's Degree: </label>
                            <input type="text" class="form-control" name="bachelor_degree" placeholder="e.g. BS Computer Science" value="{{ old('bachelor_degree', optional($patientinformation ?? '')->bachelor_degree) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_entered_service">Date Entered Service: </label>
                            <input type="date" class="form-control" name="date_entered_service" value="{{ old('date_entered_service', optional($patientinformation ?? '')->date_entered_service) }}">
                        </div>
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="alergies">Allergies:</label>
                    <input type="text" class="form-control" name="allergies" placeholder="e.g. Shrimp, Crabs, etc." value="{{ old('allergies', optional($patientinformation ?? '')->allergies) }}">
                </div>

            </div>
        </div>
    </div>
    </div>

    <div class="card">
        <div class="card-header bg-secondary text-white py-2">General Appearance & Condition</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="skin">Skin:</label>
                        <input type="text" class="form-control" name="skin" placeholder="Text Field" value="{{ old('skin', optional($patientinformation ?? '')->skin) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="heent">Head, Eyes, Ears, Nose, Throat:</label>
                        <input typel="text" class="form-control" name="heent" placeholder="Text Field" value="{{ old('heent', optional($patientinformation ?? '')->heent) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="neck">Neck:</label>
                        <input type="text" class="form-control" name="neck" placeholder="Text Field" value="{{ old('neck', optional($patientinformation ?? '')->neck) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="chest">Chest:</label>
                        <input type="text" class="form-control" name="chest" placeholder="Text Field" value="{{ old('chest', optional($patientinformation ?? '')->chest) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="heart">Heart:</label>
                        <input type="text" class="form-control" name="heart" placeholder="Text Field" value="{{ old('heart', optional($patientinformation ?? '')->heart) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="breast">Breast:</label>
                        <input type="text" class="form-control" name="breast" placeholder="Text Field" value="{{ old('breast', optional($patientinformation ?? '')->breast) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="abdomen">Abdomen:</label>
                        <input type="text" class="form-control" name="abdomen" placeholder="Text Field" value="{{ old('abdomen', optional($patientinformation ?? '')->abdomen) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="musculoskeletal">Musculoskeletal:</label>
                        <input type="text" class="form-control" name="musculoskeletal" placeholder="Text Field" value="{{ old('musculoskeletal', optional($patientinformation ?? '')->musculoskeletal) }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="neurologic">Neurologic:</label>
                <input type="text" class="form-control" name="neurologic" placeholder="Text Field" value="{{ old('neurologic', optional($patientinformation ?? '')->neurologic) }}">
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-secondary text-white py-2">Medical History</div>
        <div class="card-body">

            <div class="form-group">
                <div id="past_medical_history">
                <div class="row">
                    <div class="col-md-3">
                        <input type="checkbox" name="past_medical_history[]" value="Hypertension" {{ in_array('Hypertension', $past_medical_history ?? []) ? 'checked' : ''}}>
                        <label for="hpt-checkbox">Hypertension</label> 
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" name="past_medical_history[]" value="Diabetes Mellitus" {{ in_array('Diabetes mellitus', $past_medical_history ?? []) ? 'checked' : ''}}>
                        <label for="dm-checkbox">Diabetes mellitus</label> 
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" name="past_medical_history[]" value="Bronchial Asthma" {{ in_array('Bronchial Asthma', $past_medical_history ?? []) ? 'checked' : ''}}>
                        <label for="bronchial-asthma-checkbox">Bronchial Asthma</label> 
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" name="past_medical_history[]" value="Cancer" {{ in_array('Cancer', $past_medical_history ?? []) ? 'checked' : ''}}>
                        <label for="cancer-checkbox">Cancer</label> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <input type="checkbox" name="past_medical_history[]" value="Kidney Diseases" {{ in_array('Kidney Diseases', $past_medical_history ?? []) ? 'checked' : ''}}>
                        <label for="kidney-disease-checkbox">Kidney Diseases</label> 
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" name="past_medical_history[]" value="Heart Diseases" {{ in_array('Heart Diseases', $past_medical_history ?? []) ? 'checked' : ''}}>
                        <label for="heart-disease-checkbox">Heart Diseases</label> 
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" name="past_medical_history[]" value="Blood Transfusion" {{ in_array('Blood Transfusion', $past_medical_history ?? []) ? 'checked' : ''}}>
                        <label for="blood-transfusion-checkbox">Blood Transfusion</label> 
                    </div>
                </div>
                </div>
            </div>

            <div class="form-group">
                <label for="operations">Operations:</label>
                <input type="text" class="form-control" name="operations" placeholder="Text Field" value="{{ old('operations', optional($patientinformation ?? '')->operations) }}">
            </div>

            <div class="form-group">
                <label for="previous_hospitalization">Previous Hospitalization:</label>
                <input type="text" class="form-control" name="previous_hospitalization" placeholder="Text Field" value="{{ old('previous_hospitalization', optional($patientinformation ?? '')->previous_hospitalization) }}">
            </div>

            <div class="form-group">
                <label for="current_medication">Current Medications:</label>
                <input type="text" class="form-control" name="current_medication" placeholder="Text Field" value="{{ old('current_medication', optional($patientinformation ?? '')->current_medication) }}">
            </div>

            <div class="form-group">
                <label for="family_history">Family History:</label>
                <input type="text" class="form-control" name="family_history" placeholder="Text Field" value="{{ old('family_history', optional($patientinformation ?? '')->family_history) }}">
            </div>

            <div class="form-group">
                <label for="psychosocial_history">Psychosocial History:</label>
                <input type="text" class="form-control" name="psychosocial_history" placeholder="Text Field" value="{{ old('psychosocial_history', optional($patientinformation ?? '')->psychosocial_history) }}">
            </div>

        </div>
    </div>

    <div class="card">
        <div class="card-header bg-secondary text-white py-2">Obstetic History</div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="obstetric_score">Obstetric Score:</label>
                        <input type="text" class="form-control" name="obstetric_score" placeholder="e.g. GOS 3-1-2-0" value="{{ old('obstetric_score', optional($patientinformation ?? '')->obstetric_score) }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lmp">Last Menstrual Period:</label>
                        <input type="date" class="form-control" name="lmp" value="{{ old('lmp', optional($patientinformation ?? '')->lmp) }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="menarche">Menarche:</label>
                        <input type="date" class="form-control" name="menarche" value="{{ old('menarche', optional($patientinformation ?? '')->menarche) }}">
                    </div>
                </div>
            </div>
            
        </div>
    </div>

        <button type="submit" class="btn btn-block" style="background-color: #EC674A; border-color: #EC674A; font-size: 20px; padding: 15px 20px;"><i class="fa fa-chevron-right" aria-hidden="true"></i></button> <!-- Added btn-block class for width -->
    </form> <!--end of the form submission-->

  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('[name="birthday"]').on('blur change', function() {
            calculateAge();
        });

        function calculateAge() {
            var birthdayInput = $('[name="birthday"]').val();
            var ageInput = $('[name="age"]');

            if (birthdayInput) {
                var dob = new Date(birthdayInput);
                var today = new Date();

                var age = today.getFullYear() - dob.getFullYear();

                if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
                    age--;
                }

                ageInput.val(age);
            } else {
                ageInput.val('');
            }
        }
    });
</script> 

@endsection