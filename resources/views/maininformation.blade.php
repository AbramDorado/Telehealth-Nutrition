@extends('layouts.master')

@section('content')
<div class="jumbotron">
  <h1 class="display-10">Main Information</h1>
  <p class="lead">Patient Information and Code Blue Activation.</p>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    
    <form method="POST" action="{{ route('store_maininformation') }}"> <!--start of the form submittion-->
    @csrf

    <div class="card">
    <div class="card-header bg-secondary text-white py-2">Patient Information</div>
    <div class="card-body">

            <div class="row">
                <!-- First Column -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="patient_pin">Patient PIN:</label>
                        <input type="text" class="form-control" name="patient_pin" value="000">
                    </div>


                    <div class="form-group">
                        <label for="visit_number">Patient Visit/Encounter Number:</label>
                        <input type="text" class="form-control" name="visit_number" value="000">
                    </div>

                    
                        <label for="patient_name">Patient Name:</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="middle_name" placeholder="Middle Name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="suffix" placeholder="Suffix">
                                </div>
                            </div>
                        </div>
                    

                    <div class="form-group">
                        <label for="birthday">Date of Birth:</label>
                        <input type="date" class="form-control" name="birthday">
                    </div>
                </div>

                <!-- Second Column -->
                
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="age">Age:</label>
                                <input type="number" class="form-control" name="age" value="00">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sex">Sex:</label>
                                <select class="form-control" name="sex">
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
                                <label for="height">Height:</label>
                                <input type="number" class="form-control" name="height" value="000">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="weight">Weight:</label>
                                <input type="number" class="form-control" name="weight" value="00">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="allergies">Allergies:</label>
                        <input type="text" class="form-control" name="allergies">
                    </div>

                    <div class="form-group">
                        <label for="location">Patient Location:</label>
                        <select class="form-control" name="location">
                            <option value="">Select a location</option>
                            <option value="Room A1">Room A1</option>
                            <option value="Room A2">Room A2</option>
                            <option value="Room A3">Room A3</option>
                        </select>
                    </div>
                </div>
            </div>
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
                    <input type="text" class="form-control" name="code_number" value="000">
                </div>

                <div class="form-group">
                    <label for="code_start_dt">Date/Time of Activation of Code:</label>
                    <input type="datetime-local" class="form-control" name="code_start_dt" >
                </div>


                <div class="form-group">
                    <label for="arrest_dt">Date/Time of Arrest:</label>
                    <input type="datetime-local" class="form-control" name="arrest_dt" >
                </div>

                <div class="form-group">
                    <label for="reason_for_activation">Reason for Code Blue Activation:</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="radio" name="reason_for_activation" value="unconscious"> Unconscious
                        </div>

                        <div class="col-md-6">
                            <input type="radio" name="reason_for_activation" value="pulseless"> Pulseless
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Second Column -->
                <div class="form-group">
                    <label for="initial_reporter">Initially Reported By:</label>
                    <select class="form-control" name="initial_reporter">
                        <option value="">Select a person</option>
                        <option value="nurse">Nurse</option>
                        <option value="doctor">Doctor</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="code_team_arrival_dt">Date/Time Code Team Arrival:</label>
                    <input type="datetime-local" class="form-control" name="code_team_arrival_dt" >
                </div>

                <div class="form-group">
                    <label for="e_cart_arrival_dt">Date/Time e-Cart Arrival:</label>
                    <input type="datetime-local" class="form-control" name="e_cart_arrival_dt" >
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

    <form action="{{ url('/store_maininformation') }}" method="post">
            @csrf 
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>

</form> 

  </div>
</div>
@endsection