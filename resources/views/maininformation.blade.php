@extends('layouts.master')

@section('content')
<div class="jumbotron">
  <h1 class="display-10">Main Information</h1>
  <p class="lead">Patient Information and Code Blue Activation.</p>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    
    <div class="card">
    <div class="card-header bg-secondary text-white py-2">Patient Information</div>
    <div class="card-body">
        <form method="POST" action="{{ route('store_maininformation') }}">
            @csrf

            <div class="row">
                <!-- First Column -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="patient_pin">Patient PIN:</label>
                        <input type="text" class="form-control" name="patient_pin" required>
                    </div>

                    <div class="form-group">
                        <label for="patient_visit_encounter_number">Patient Visit/Encounter Number:</label>
                        <input type="text" class="form-control" name="patient_visit_encounter_number" required>
                    </div>

                    
                        <label for="patient_name">Patient Name:</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="patient_name[first_name]" placeholder="First Name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="patient_name[last_name]" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="patient_name[middle_name]" placeholder="Middle Name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="patient_name[suffix]" placeholder="Suffix">
                                </div>
                            </div>
                        </div>
                    

                    <div class="form-group">
                        <label for="patient_date_of_birth">Date of Birth:</label>
                        <input type="date" class="form-control" name="patient_date_of_birth" required>
                    </div>
                </div>

                <!-- Second Column -->
                
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="patient_age">Age:</label>
                                <input type="number" class="form-control" name="patient_age" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="patient_sex">Sex:</label>
                                <select class="form-control" name="patient_sex" required>
                                    <option value="">Select a sex</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="patient_height">Height:</label>
                                <input type="number" class="form-control" name="patient_height" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="patient_weight">Weight:</label>
                                <input type="number" class="form-control" name="patient_weight" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="patient_allergies">Allergies:</label>
                        <input type="text" class="form-control" name="patient_allergies">
                    </div>

                    <div class="form-group">
                        <label for="patient_location">Patient Location:</label>
                        <select class="form-control" name="patient_location" required>
                            <option value="">Select a location</option>
                            <option value="Room A1">Room A1</option>
                            <option value="Room A2">Room A2</option>
                            <option value="Room A3">Room A3</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="card">
    <div class="card-header card-header bg-secondary text-white py-2">Code Blue Activation</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <!-- First Column -->
                <div class="form-group">
                    <label for="code_number">Code Number:</label>
                    <input type="text" class="form-control" name="code_number" required>
                </div>

                <div class="form-group">
                    <label for="date_time_of_activation_of_code">Date/Time of Activation of Code:</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="date_time_of_activation_of_code[date]" required>
                        </div>

                        <div class="col-md-6">
                            <input type="time" class="form-control" name="date_time_of_activation_of_code[time]" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="date_time_of_arrest">Date/Time of Arrest:</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="date_time_of_arrest[date]" required>
                        </div>

                        <div class="col-md-6">
                            <input type="time" class="form-control" name="date_time_of_arrest[time]" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="reason_for_code_blue_activation">Reason for Code Blue Activation:</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="radio" name="reason_for_code_blue_activation" value="unconscious"> Unconscious
                        </div>

                        <div class="col-md-6">
                            <input type="radio" name="reason_for_code_blue_activation" value="pulseless"> Pulseless
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Second Column -->
                <div class="form-group">
                    <label for="initially_reported_by">Initially Reported By:</label>
                    <select class="form-control" name="initially_reported_by" required>
                        <option value="">Select a person</option>
                        <option value="nurse">Nurse</option>
                        <option value="doctor">Doctor</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_time_code_team_arrival">Date/Time Code Team Arrival:</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="date_time_code_team_arrival[date]" required>
                        </div>

                        <div class="col-md-6">
                            <input type="time" class="form-control" name="date_time_code_team_arrival[time]" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="date_time_e_cart_arrival">Date/Time e-Cart Arrival:</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="date_time_e_cart_arrival[date]" required>
                        </div>

                        <div class="col-md-6">
                            <input type="time" class="form-control" name="date_time_e_cart_arrival[time]" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="witnessed">Witnessed?</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="radio" name="witnessed" value="yes"> Yes
                        </div>

                        <div class="col-md-6">
                            <input type="radio" name="witnessed" value="no"> No
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <button type="submit" class="btn btn-primary btn-block">Submit</button> <!-- Added btn-block class for width -->
  </div>
</div>
@endsection