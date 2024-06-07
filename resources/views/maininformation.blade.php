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
          <h1 class="display-4">Main Information</h1>
          <p class="lead">Patient Information and Code Blue Activation.</p>
        </div>
      </div>
    </div>
  </div>
</div>
            
<div class="fixed-header">
    <a class="btn btn-secondary" style="color: #fff; background-color: #6c757d" href="{{ route('maininformation', ['code_number' => $code_number]) }}">Patient Information</a>
    <a id="initialResuscitationBtn" class="btn btn-secondary disabled" href="{{ route('initialresuscitation', ['code_number' => $code_number]) }}" >S.O.A.P.</a>
    <a id="flowsheetBtn" class="btn btn-secondary disabled" href="{{ route('flowsheet', ['code_number' => $code_number]) }}" >Lab Test Requests</a>
    <!-- Add additional buttons below -->
    <a id="outcomeBtn" class="btn btn-secondary disabled" href="{{ route('outcome', ['code_number' => $code_number]) }}" >Outcome of the Code</a>
    <a id="evaluationBtn" class="btn btn-secondary disabled" href="{{ route('evaluation', ['code_number' => $code_number]) }}" >Debriefing and Evaluation</a>
    <a id="codeteamBtn" class="btn btn-secondary disabled" href="{{ route('codeteam', ['code_number' => $code_number]) }}" >Code Team</a>
    <!-- Add more buttons if needed -->
</div>




<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    
    <form method="POST" action="{{ route('store_maininformation', ['code_number' => $code_number]) }}"> <!--start of the form submittion-->
        @csrf

    <div class="card">
    <div class="card-header bg-secondary text-white py-2">Patient Information</div>
    <div class="card-body">
        <div class="row">
            <!-- First Column -->
            <div class="col-md-6">

                <div class="form-group">
                    <label for="referral_control_num">Referral Control Number:</label>
                    <input type="text" class="form-control" name="referral_control_num" pattern="\d+" title="Please enter only numbers" value="{{ old('referral_control_num', optional($patient ?? '')->referral_control_num) }}">
                </div>

                <label for="patient_name">Patient Name:</label>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ old('first_name', optional($patient ?? '')->first_name) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ old('last_name', optional($patient ?? '')->last_name) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="{{ old('middle_name', optional($patient ?? '')->middle_name) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="suffix" placeholder="Suffix" value="{{ old('suffix', optional($patient ?? '')->suffix) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birthday">Date of Birth:</label>
                            <input type="date" class="form-control" name="birthday" value="{{ old('birthday', optional($patient ?? '')->birthday) }}" oninput="calculateAge()">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" class="form-control" name="age" value="{{ old('age', optional($patient ?? '')->age) }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="home_address">Home Address:</label>
                    <input type="text" class="form-control" name="home_address" placeholder="Current Address" value="{{ old('home_address', optional($patient ?? '')->home_address) }}">
                </div>

                <div class="form-group">
                    <label for="blood_type">Blood Type:</label>
                    <select class="form-control" name="blood_type">
                        <option value="">Select blood type</option>
                        <option value="A+" {{ old('blood_type', optional($patient ?? '')->blood_type) === 'male' ? 'selected' : '' }}>A+</option>
                        <option value="A-" {{ old('blood_type', optional($patient ?? '')->blood_type) === 'female' ? 'selected' : '' }}>A-</option>
                        <option value="B+" {{ old('blood_type', optional($patient ?? '')->blood_type) === 'other' ? 'selected' : '' }}>B+</option>
                        <option value="B-" {{ old('blood_type', optional($patient ?? '')->blood_type) === 'other' ? 'selected' : '' }}>B-</option>
                        <option value="AB+" {{ old('blood_type', optional($patient ?? '')->blood_type) === 'other' ? 'selected' : '' }}>AB+</option>
                        <option value="AB-" {{ old('blood_type', optional($patient ?? '')->blood_type) === 'other' ? 'selected' : '' }}>AB-</option>
                        <option value="O+" {{ old('blood_type', optional($patient ?? '')->blood_type) === 'other' ? 'selected' : '' }}>O+</option>
                        <option value="O-" {{ old('blood_type', optional($patient ?? '')->blood_type) === 'other' ? 'selected' : '' }}>O-</option>
                    </select>
                </div>
                
            </div>

            <!-- Second Column -->
            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact_number">Contact Number:</label>
                            <input type="text" class="form-control" name="contact_number" pattern="\d+" title="Please enter only numbers" value="{{ old('contact_number', optional($patient ?? '')->contact_number) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="religion">Religion:</label>
                            <input type="text" class="form-control" name="religion" value="{{ old('religion', optional($patient ?? '')->religion) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="civil_status">Civil Status:</label>
                            <select class="form-control" name="civil_status">
                                <option value="">Select Civil Status</option>
                                <option value="married" {{ old('civil_status', optional($patient ?? '')->civil_status) === 'married' ? 'selected' : '' }}>Married</option>
                                <option value="single" {{ old('civil_status', optional($patient ?? '')->civil_status) === 'single' ? 'selected' : '' }}>Single</option>
                                <option value="divorced" {{ old('civil_status', optional($patient ?? '')->civil_status) === 'divorced' ? 'selected' : '' }}>Divorced</option>
                                <option value="widowed" {{ old('civil_status', optional($patient ?? '')->civil_status) === 'widowed' ? 'selected' : '' }}>Widowed</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sex">Sex:</label>
                            <select class="form-control" name="sex">
                                <option value="">Select a sex</option>
                                <option value="male" {{ old('sex', optional($patient ?? '')->sex) === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('sex', optional($patient ?? '')->sex) === 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('sex', optional($patient ?? '')->sex) === 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="unit_assignment">Unit Assignment: </label>
                            <input type="text" class="form-control" name="unit_assignment" value="{{ old('unit_assignment', optional($patient ?? '')->unit_assignment) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position">Rank/Position: </label>
                            <input type="text" class="form-control" name="position" value="{{ old('position', optional($patient ?? '')->position) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bachelor_degree">Bachelor's Degree: </label>
                            <input type="text" class="form-control" name="bachelor_degree" value="{{ old('bachelor_degree', optional($patient ?? '')->bachelor_degree) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_entered_service">Date Entered Service: </label>
                            <input type="date" class="form-control" name="date_entered_service" value="{{ old('date_entered_service', optional($patient ?? '')->date_entered_service) }}">
                        </div>
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="alergies">Allergies:</label>
                    <input type="text" class="form-control" name="allergies" value="{{ old('allergies', optional($patient ?? '')->allergies) }}">
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
                        <input type="text" class="form-control" name="skin" value="{{ old('skin', optional($patient ?? '')->skin) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="heent">Head, Eyes, Ears, Nose, Throat:</label>
                        <input typel="text" class="form-control" name="heent" value="{{ old('heent', optional($patient ?? '')->heent) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="neck">Neck:</label>
                        <input type="text" class="form-control" name="neck" value="{{ old('neck', optional($patient ?? '')->neck) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="chest">Chest:</label>
                        <input type="text" class="form-control" name="chest" value="{{ old('chest', optional($patient ?? '')->chest) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="heart">Heart:</label>
                        <input type="text" class="form-control" name="heart" value="{{ old('heart', optional($patient ?? '')->heart) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="breast">Breast:</label>
                        <input type="text" class="form-control" name="breast" value="{{ old('breast', optional($patient ?? '')->breast) }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="abdomen">Abdomen:</label>
                        <input type="text" class="form-control" name="abdomen" value="{{ old('abdomen', optional($patient ?? '')->abdomen) }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="musculoskeletal">Musculoskeletal:</label>
                        <input type="text" class="form-control" name="musculoskeletal" value="{{ old('musculoskeletal', optional($patient ?? '')->musculoskeletal) }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="neurologic">Neurologic:</label>
                <input type="text" class="form-control" name="neurologic" value="{{ old('neurologic', optional($patient ?? '')->neurologic) }}">
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
                <label for="heent">Operations:</label>
                <input type="text" class="form-control" name="operations" value="{{ old('operations', optional($patient ?? '')->operations) }}">
            </div>

            <div class="form-group">
                <label for="heent">Previous Hospitalization:</label>
                <input type="text" class="form-control" name="previous_hospitalization" value="{{ old('previous_hospitalization', optional($patient ?? '')->previous_hospitalization) }}">
            </div>

            <div class="form-group">
                <label for="heent">Current Medications:</label>
                <input type="text" class="form-control" name="current_medications" value="{{ old('current_medications', optional($patient ?? '')->current_medications) }}">
            </div>

            <div class="form-group">
                <label for="heent">Family History:</label>
                <input type="text" class="form-control" name="heent" value="{{ old('heent', optional($patient ?? '')->heent) }}">
            </div>

            <div class="form-group">
                <label for="heent">Psychosocial History:</label>
                <input type="text" class="form-control" name="heent" value="{{ old('heent', optional($patient ?? '')->heent) }}">
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
                        <input type="text" class="form-control" name="obstetric_score" value="{{ old('obstetric_score', optional($patient ?? '')->obstetric_score) }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lmp">Last Menstrual Period:</label>
                        <input type="text" class="form-control" name="lmp" value="{{ old('lmp', optional($patient ?? '')->lmp) }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lmp">Menarche:</label>
                        <input type="text" class="form-control" name="lmp" value="{{ old('lmp', optional($patient ?? '')->lmp) }}">
                    </div>
                </div>
            </div>
            
        </div>
    </div>

        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-chevron-right" aria-hidden="true"></i></button> <!-- Added btn-block class for width -->
    </form> <!--end of the form submission-->

  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // Function to handle the selection of a patient PIN from the dropdown
    function selectPatientPin(patientPin) {
        // Fill the patient PIN input with the selected value
        $('#patient_pin').val(patientPin);

        // Call the function to fetch patient information based on patient PIN
        fetchAndFillPatientInformation(patientPin);

        // Hide the dropdown
        $('#patientPinDropdown').hide();
    }

    // Function to fetch patient information based on patient PIN
    function fetchAndFillPatientInformation(patientPin) {
        // Make an AJAX request to the Laravel route to fetch patient information
        $.ajax({
            url: '{{ route("fetchPatientInformation") }}',
            method: 'GET',
            data: { patient_pin: patientPin },
            success: function (data) {
                // Fill out the patient information fields with the retrieved data
                $('[name="visit_number"]').val(data.visit_number);
                $('[name="first_name"]').val(data.first_name);
                $('[name="last_name"]').val(data.last_name);
                $('[name="middle_name"]').val(data.middle_name);
                $('[name="suffix"]').val(data.suffix);
                $('[name="birthday"]').val(data.birthday);
                $('[name="age"]').val(data.age);
                $('[name="sex"]').val(data.sex);
                $('[name="height"]').val(data.height);
                $('[name="weight"]').val(data.weight);
                $('[name="allergies"]').val(data.allergies);
                $('[name="location"]').val(data.location);
                // ... Add other fields as needed
            },
            error: function () {
                // Handle errors if needed
            }
        });
    }

        $(document).ready(function () {
            // Reference to the dropdown
            var dropdown = $('#patientPinDropdown');

            // Listen for input changes on the patient PIN field
            $('#patient_pin').on('input', function () {
                // Get the entered value
                var inputVal = $(this).val();

                // Hide the dropdown if the input is empty
                if (inputVal.trim() === '') {
                    dropdown.hide();
                    return;
                }

                // Make an AJAX request to the Laravel route to fetch matching patient PINs
                $.ajax({
                    url: '{{ route("searchPatientPins") }}',
                    method: 'GET',
                    data: { patient_pin: inputVal },
                    success: function (data) {
                        console.log('Received data:', data);

                        // Ensure the data is an array
                        if (!Array.isArray(data)) {
                            console.error('Invalid data format. Expected an array.');
                            dropdown.hide();
                            return;
                        }

                        // Filter data based on similarity to the input
                        var filteredData = data.filter(function (option) {
                            // Ensure each option is a number before using includes
                            return (typeof option === 'number' && option.toString().includes(inputVal));
                        });

                        console.log('Filtered data:', filteredData);

                        // Display the matching options in a dropdown
                        dropdown.empty();

                        // Append each matching option to the dropdown
                        filteredData.forEach(function (option) {
                            dropdown.append('<div class="dropdown-item" onclick="selectPatientPin(' + option + ')">' + option + '</div>');
                        });

                        // Show the dropdown
                        dropdown.show();
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                        // Hide the dropdown in case of an error
                        dropdown.hide();
                    }
                });
            });

                });
    </script>

<script>
$(document).ready(function() {
    // Check if the patient PIN exists
    var patientPIN = "{{ old('patient_pin', optional($patient ?? '')->patient_pin) }}";

    if (patientPIN !== '') {
        // If patient PIN exists, enable buttons
        $("#initialResuscitationBtn, #flowsheetBtn, #outcomeBtn, #evaluationBtn, #codeteamBtn").removeClass('disabled');
    }
});
</script>

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

<!-- Add this script to toggle the visibility of the other reporter text input -->
<script>
    $(document).ready(function () {
        // Initially hide the other reporter text input
        $('#other_reporter').hide();

        // Listen for changes in the initial reporter select box
        $('#initial_reporter').on('change', function () {
            // If "other" is selected, show the text input; otherwise, hide it
            if ($(this).val() === 'other') {
                $('#other_reporter').show();
            } else {
                $('#other_reporter').hide();
            }
        });
    });
</script>

@endsection