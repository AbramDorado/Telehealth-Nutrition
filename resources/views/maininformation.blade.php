@extends('layouts.master')

@section('content')
<div class="jumbotron">
  <h1 class="display-10">Main Information</h1>
  <p class="lead">Patient Information and Code Blue Activation.</p>
  <!-- Add a dropdown button to toggle the menu -->
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Toggle Menu
  </button>
  
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <!-- Your list of buttons goes here -->
    <a class="dropdown-item" href="{{ route('maininformation', ['code_number' => $code_number]) }}">Main Information</a>
    <a class="dropdown-item" href="{{ route('initialresuscitation', ['code_number' => $code_number]) }}">Initial Resuscitation</a>
    <a class="dropdown-item" href="{{ route('flowsheet', ['code_number' => $code_number]) }}">Flowsheet</a>
    <a class="dropdown-item" href="{{ route('outcome', ['code_number' => $code_number]) }}">Outcome of the Code</a>
    <a class="dropdown-item" href="{{ route('evaluation', ['code_number' => $code_number]) }}">Debriefing and Evaluation</a>
    <a class="dropdown-item" href="{{ route('codeteam', ['code_number' => $code_number]) }}">Code Team</a>
  </div>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    
    <form method="POST" action="{{ route('store_maininformation', ['code_number' => $code_number]) }}"> <!--start of the form submittion-->
        @csrf

        <div class="card">
    <div class="card-header bg-secondary text-white py-2">Patient Information</div>
    <div class="card-body">

            <div class="row">
                <!-- First Column -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="patient_pin">Patient PIN:</label>
                        <input type="text" class="form-control" name="patient_pin" value="{{ old('patient_pin', $patient->patient_pin ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="visit_number">Patient Visit/Encounter Number:</label>
                        <input type="text" class="form-control" name="visit_number">
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
                                <input type="number" class="form-control" name="age" >
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
                                <input type="number" class="form-control" name="height">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="weight">Weight:</label>
                                <input type="number" class="form-control" name="weight">
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
                    <input type="text" class="form-control" name="code_number" value="{{ request('code_number') }}" readonly>
                </div>

                <div class="form-group">
                    <label for="code_start_dt">Date/Time of Activation of Code:</label>
                    <input type="datetime-local" class="form-control" name="code_start_dt" value="{{ old('code_start_dt', optional($codeBlueActivation ?? '')->code_start_dt ? (\Carbon\Carbon::parse($codeBlueActivation['code_start_dt'])->format('Y-m-d H:i:s')) : '') }}">
                </div>


                <div class="form-group">
                    <label for="arrest_dt">Date/Time of Arrest:</label>
                    <input type="datetime-local" class="form-control" name="arrest_dt" value="{{ old('arrest_dt', optional($codeBlueActivation ?? '')->arrest_dt ? (\Carbon\Carbon::parse($codeBlueActivation['arrest_dt'])->format('Y-m-d H:i:s')) : '') }}">
                </div>

                <div class="form-group">
                    <label for="reason_for_activation">Reason for Code Blue Activation:</label>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="reason_unconscious">
                                <input type="radio" name="reason_for_activation" value="unconscious" id="reason_unconscious" {{ old('reason_for_activation', optional($codeBlueActivation ?? '')->reason_for_activation) === 'unconscious' ? 'checked' : '' }}>
                                Unconscious
                            </label>
                        </div>

                        <div class="col-md-6">
                            <label for="reason_pulseless">
                                <input type="radio" name="reason_for_activation" value="pulseless" id="reason_pulseless" {{ old('reason_for_activation', optional($codeBlueActivation ?? '')->reason_for_activation) === 'pulseless' ? 'checked' : '' }}>
                                Pulseless
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Second Column -->
                <div class="form-group">
                    <label for="initial_reporter">Initially Reported By:</label>
                    <select class="form-control" name="initial_reporter" id="initial_reporter">
                        @php
                            $selectedReporter = old('initial_reporter', optional($codeBlueActivation ?? '')->initial_reporter ?? ''); 
                        @endphp

                        @foreach(['', 'nurse', 'doctor', 'other'] as $option)
                            <option value="{{ $option }}" {{ $selectedReporter === $option ? 'selected' : '' }}>
                                {{ ucfirst($option) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="code_team_arrival_dt">Date/Time Code Team Arrival:</label>
                    <input type="datetime-local" class="form-control" name="code_team_arrival_dt" value="{{ old('code_team_arrival_dt', optional($codeBlueActivation ?? '')->code_team_arrival_dt ? (\Carbon\Carbon::parse($codeBlueActivation['code_team_arrival_dt'])->format('Y-m-d H:i:s')) : '') }}">
                </div>

                <div class="form-group">
                    <label for="e_cart_arrival_dt">Date/Time e-Cart Arrival:</label>
                    <input type="datetime-local" class="form-control" name="e_cart_arrival_dt"  value="{{ old('e_cart_arrival_dt', optional($codeBlueActivation ?? '')->e_cart_arrival_dt ? (\Carbon\Carbon::parse($codeBlueActivation['e_cart_arrival_dt'])->format('Y-m-d H:i:s')) : '') }}">
                </div>

                <div class="form-group">
                    <label for="witnessed">Witnessed?</label>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="witnessed_yes">
                                <input type="radio" name="witnessed" value="yes" id="witnessed_yes" {{ old('witnessed', optional($codeBlueActivation ?? '')->witnessed) === 'yes' ? 'checked' : '' }}>
                                Yes
                            </label>
                        </div>

                        <div class="col-md-6">
                            <label for="witnessed_no">
                                <input type="radio" name="witnessed" value="no" id="witnessed_no" {{ old('witnessed', optional($codeBlueActivation ?? '')->witnessed) === 'no' ? 'checked' : '' }}>
                                No
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <button type="submit" class="btn btn-primary btn-block">Submit</button> <!-- Added btn-block class for width -->
</form> <!--end of the form submittion-->

  </div>
</div>
@endsection