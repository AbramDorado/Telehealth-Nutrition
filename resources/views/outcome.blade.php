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
    <a class="dropdown-item" href="/maininformation">Main Information</a>
    <a class="dropdown-item" href="/initialresuscitation">Initial Resuscitation</a>
    <a class="dropdown-item" href="/flowsheet">Flowsheet</a>
    <a class="dropdown-item" href="/outcome">Outcome of the Code</a>
    <a class="dropdown-item" href="/evaluation">Debriefing and Evaluation</a>
    <a class="dropdown-item" href="/codeteam">Code Team</a>
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
                                <option value="Survived - Return of Spontaneous Circulation">Survived - Return of Spontaneous Circulation</option>
                                <option value="Died - efforts terminated; no sustained return of circulation">Died - efforts terminated; no sustained return of circulation</option>
                                <option value="Died - with Advanced Directives/DNR in place">Died - with Advanced Directives/DNR in place</option>
                            </select>
                        </div>

                        <div class="form-group" id="death_dt" style="display: none;">
                            <label for="death_dt">Date and Time of Death:</label>
                            <input type="datetime-local" class="form-control" name="death_dt">
                        </div>

                        <div class="form-group" id="survived_fields" style="display: block;">
                            <h2>Assessment</h2>

                            <label for="bp_systolic">Blood Pressure, Systolic:</label>
                            <input type="number" class="form-control" name="bp_systolic">

                            <label for="bp_diastolic">Blood Pressure, Diastolic:</label>
                            <input type="number" class="form-control" name="bp_diastolic">

                            <label for="heart_rate">Heart Rate:</label>
                            <input type="number" class="form-control" name="heart_rate">

                            <label for="respiratory_rate">Respiratory Rate:</label>
                            <input type="number" class="form-control" name="respiratory_rate">

                            <label for="rhythm">Rhythm:</label>
                            <select class="form-control" name="rhythm">
                                <option value="Normal sinus rhythm">Normal sinus rhythm</option>
                                <option value="Sinus bradycardia">Sinus bradycardia</option>
                                <option value="Junctional rhythm">Junctional rhythm</option>
                                <option value="Idioventricular rhythm">Idioventricular rhythm</option>
                                <option value="AV Block">AV Block</option>
                                <option value="Sinus pause">Sinus pause</option>
                                <option value="Slow Atrial fibrillation">Slow Atrial fibrillation</option>
                                <option value="Sinus tachycardia">Sinus tachycardia</option>
                                <option value="Supraventricular tachycardia">Supraventricular tachycardia</option>
                                <option value="Atrial flutter">Atrial flutter</option>
                                <option value="Rapid Atrial fibrillation">Rapid Atrial fibrillation</option>
                                <option value="Multifocal atrial tachycardia">Multifocal atrial tachycardia</option>
                                <option value="Ventricular tachycardia">Ventricular tachycardia</option>
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
