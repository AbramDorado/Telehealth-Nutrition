@extends('layouts.master')

@section('content')
<div class="jumbotron">
  <h1 class="display-10">Outcome</h1>
  <p class="lead">Outcome of the code</p>
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
            <div class="card">
                <div class="card-header">Outcome</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store_outcome', ['code_number' => $code_number]) }}">
                        @csrf

                        <div class="form-group">
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

                            <label for="bp_systolic">Blood Pressure, Systolic:</label>
                            <input type="number" class="form-control" name="bp_systolic" value="{{ $outcome->bp_systolic ?? old('bp_systolic') }}">

                            <label for="bp_diastolic">Blood Pressure, Diastolic:</label>
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

                        <button type="submit" class="btn btn-primary">Submit</button>
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
