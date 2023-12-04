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
            <h1 class="display-10">Outcome</h1>
            <p class="lead">Outcome of the code</p>
        </div>
      </div>
    </div>
  </div>
</div>
            
<div class="fixed-header">
    <a class="btn btn-secondary" href="{{ route('maininformation', ['code_number' => $code_number]) }}">Main Information</a>
    <a class="btn btn-secondary" href="{{ route('initialresuscitation', ['code_number' => $code_number]) }}">Initial Resuscitation</a>
    <a class="btn btn-secondary" href="{{ route('flowsheet', ['code_number' => $code_number]) }}">Flowsheet</a>
    <a class="btn btn-secondary" style="color: #fff; background-color: #6c757d" href="{{ route('outcome', ['code_number' => $code_number]) }}">Outcome of the Code</a>
    <a class="btn btn-secondary" href="{{ route('evaluation', ['code_number' => $code_number]) }}">Debriefing and Evaluation</a>
    <a class="btn btn-secondary" href="{{ route('codeteam', ['code_number' => $code_number]) }}">Code Team</a>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary text-white py-2">Outcome</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store_outcome', ['code_number' => $code_number]) }}">
                        @csrf

                        <div class="form-group">
                            <div class="form-group">
                                <label for="code_end_dt">Date/Time Resuscitation Event Ended:</label>
                                <input type="datetime-local" class="form-control" name="code_end_dt" value="{{ old('code_end_dt', optional($outcome ?? '')->code_end_dt ? (\Carbon\Carbon::parse($outcome['code_end_dt'])->format('Y-m-d H:i:s')) : '') }}">
                            </div>
                            
                            <label for="outcome">Outcome:</label>
                            <select class="form-control" name="outcome" id="outcome">
                            @php
                                $selectedOutcome = old('outcome', $outcome->outcome ?? ''); 
                            @endphp

                            @foreach(['Survived - Return of Spontaneous Circulation', 'Died - efforts terminated; no sustained return of circulation', 'Died - with Advanced Directives/DNR in place'] as $option)
                                <option value="{{ $option }}" {{ $selectedOutcome === $option ? 'selected' : '' }}>
                                    {{ $option }}
                                </option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group" id="death_dt" style="display: none;">
                            <label for="death_dt">Date and Time of Death:</label>
                            <input type="datetime-local" class="form-control" name="death_dt" value="{{ old('death_dt', optional($outcome)->death_dt ? (\Carbon\Carbon::parse($outcome->death_dt))->format('Y-m-d\TH:i') : '') }}">
                        </div>


                        <div class="form-group" id="survived_fields" style="display: block;">
                            <h2>Assessment</h2>

                            <label for="bp_systolic">Blood Pressure, Systolic (mmHg):</label>
                            <input type="number" class="form-control" name="bp_systolic" value="{{ $outcome->bp_systolic ?? old('bp_systolic') }}">

                            <label for="bp_diastolic">Blood Pressure, Diastolic (mmHg):</label>
                            <input type="number" class="form-control" name="bp_diastolic" value="{{ $outcome->bp_diastolic ?? old('bp_diastolic') }}">

                            <label for="heart_rate">Heart Rate:</label>
                            <input type="number" class="form-control" name="heart_rate" value="{{ $outcome->heart_rate ?? old('heart_rate') }}">

                            <label for="respiratory_rate">Respiratory Rate:</label>
                            <input type="number" class="form-control" name="respiratory_rate" value="{{ $outcome->respiratory_rate ?? old('respiratory_rate') }}">

                            <label for="rhythm">Rhythm:</label>
                            <select class="form-control" name="rhythm">
                                @php
                                    $selectedRhythm = old('rhythm', $outcome->rhythm ?? ''); 
                                @endphp

                                @foreach([
                                    'Normal sinus rhythm', 'Sinus bradycardia', 'Junctional rhythm', 'Idioventricular rhythm',
                                    'AV Block', 'Sinus pause', 'Slow Atrial fibrillation', 'Sinus tachycardia',
                                    'Supraventricular tachycardia', 'Atrial flutter', 'Rapid Atrial fibrillation',
                                    'Multifocal atrial tachycardia', 'Ventricular tachycardia'
                                ] as $option)
                                    <option value="{{ $option }}" {{ $selectedRhythm === $option ? 'selected' : '' }}>
                                        {{ $option }}
                                    </option>
                                @endforeach
                            </select>

                        </div>

                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const outcomeSelect = document.getElementById("outcome");
    const deathDtField = document.getElementById("death_dt");
    const survivedFields = document.getElementById("survived_fields");

    outcomeSelect.addEventListener("change", function () {
        if (outcomeSelect.value === "Died - efforts terminated; no sustained return of circulation" || outcomeSelect.value === "Died - with Advanced Directives/DNR in place") {
            deathDtField.style.display = "block";
            survivedFields.style.display = "none";
        } else if (outcomeSelect.value === "Survived - Return of Spontaneous Circulation") {
            deathDtField.style.display = "none";
            survivedFields.style.display = "block";
        } else {
            deathDtField.style.display = "none";
            survivedFields.style.display = "none";
        }
    });
});
</script>

@endsection
