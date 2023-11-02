@extends('layouts.master')

@section('content')
<div class="jumbotron">
  <h1 class="display-10">Initial Resuscitation</h1>
  <p class="lead">Airway/Ventilation and Circulation</p>
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
    
    <form method="POST" action="{{ route('store_initialresuscitation', ['code_number' => $code_number]) }}">
    @csrf
    <div class="card">
    <div class="card-header bg-secondary text-white py-2">Airway/Ventilation</div>
    <div class="card-body">

            <div class="row">
                <!-- First Column -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="breathing_upon_ca">Breathing upon code activation:</label>
                        <select name="breathing_upon_ca" class="form-control">
                            <option value="">Select an option</option>
                            <option value="Spontaneous">Spontaneous</option>
                            <option value="Apneic">Apneic</option>
                            <option value="Agonal">Agonal</option>
                            <option value="Assisted">Assisted</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="first_ventilation_dt">1st Assisted Ventilation Date/Time:</label>
                        <input type="datetime-local" class="form-control" name="first_ventilation_dt">
                    </div>

                    <div class="form-group">
                        <label for="ventilation">Ventilation via:</label>
                        <select name="ventilation" id="ventilation" class="form-control">
                            <option value="">Select an option</option>
                            <option value="Bag-Valve Mask">Bag-Valve Mask</option>
                            <option value="Tracheostomy">Tracheostomy</option>
                            <option value="Endotracheal Tube">Endotracheal Tube</option>
                            <option value="others">Others</option>
                        </select>
                    </div>

                    <div class="form-group" id="othersText" style="display: none;">
                        <label for="other_ventilation">Other Ventilation Method:</label>
                        <input type="text" name="other_ventilation" id="other_ventilation" class="form-control">
                    </div>

                    
                </div>

                <!-- Second Column -->
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="intubation_dt">Intubated Date/Time:</label>
                        <input type="datetime-local" class="form-control" name="intubation_dt">
                    </div>
                        
                    <div class="form-group">
                        <label for="et_tube_size">ET Tube Size:</label>
                        <input type="number" class="form-control" name="et_tube_size" placeholder="0">
                    </div>
                   
                    <div class="form-group">
                        <label for="intubation_attempts">Number of intubation attempts:</label>
                        <input type="number" class="form-control" name="intubation_attempts" placeholder="0">
                    </div>
                
                    <div class="form-group">
                        <label for="et_tube_information">ET Tube Information</label>
                        <div id="et_tube_information">
                            <input type="checkbox" id="auscultation-checkbox" name="et_tube_information[]" value="Auscultation">
                            <label for="auscultation-checkbox">Auscultation</label>

                            <input type="checkbox" id="exhaled-co2-checkbox" name="et_tube_information[]" value="Exhaled CO2">
                            <label for="exhaled-co2-checkbox">Exhaled CO2</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="card">
    <div class="card-header card-header bg-secondary text-white py-2">Circulation</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <!-- First Column -->
                    <div class="form-group">
                    <label for="first_documented_rhythm_dt">1st Documented Rhythm:</label>
                        <textarea type="text" class="form-control" name="first_documented_rhythm_dt"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="first_pulseless_rhythm_dt">1st Pulseless Rhythm Detected Date/Time:</label>
                        <input type="datetime-local" class="form-control" name="first_pulseless_rhythm_dt">
                    </div>

                    <div class="form-group">
                        <label for="compressions_dt">Compressions Started Date/Time:</label>
                        <input type="datetime-local" class="form-control" name="compressions_dt">
                    </div>
                </div>

                <!-- Second Column -->
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aed_applied">AED Applied:</label>
                        <label for="aed_applied_yes">
                            <input type="radio" name="aed_applied" value="Yes" id="aed_applied_yes">
                                Yes
                        </label>
                        <label for="aed_applied_no">
                            <input type="radio" name="aed_applied" value="No" id="aed_applied_no">
                                No
                        </label>
                        <div id ="aed_applied_dt_div" style="display: none;">
                            <label for="aed_applied_dt">Date/Time:</label>
                            <input type="datetime-local" class="form-control" name="aed_applied_dt" id="aed_applied_dt">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pacemaker_on">Pacemaker on:</label>
                        <label for="pacemaker_on_yes">
                            <input type="radio" name="pacemaker_on" value="Yes" id="pacemaker_on_yes">
                                Yes
                        </label>
                        <label for="pacemaker_on_no">
                            <input type="radio" name="pacemaker_on" value="No" id="pacemaker_on_no">
                                No
                        </label>
                        <div id ="pacemaker_on_dt_div" style="display: none;">
                            <label for="pacemaker_on_dt">Date/Time:</label>
                            <input type="datetime-local" class="form-control" name="pacemaker_on_dt" id="pacemaker_on_dt">
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
</div>

        <form action="{{ url('/store_initialresuscitation') }}" method="post">
            @csrf 
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
</form> 

  </div>
</div>

<script>
    const ventilationSelect = document.getElementById('ventilation');
    const othersText = document.getElementById('othersText'); 
    const otherVentilationInput = document.getElementById('other_ventilation');

    ventilationSelect.addEventListener('change', function() {
        if (ventilationSelect.value === 'others') {
            othersText.style.display = 'block';
            otherVentilationInput.required = true;
        } else {
            othersText.style.display = 'none';
            otherVentilationInput.required = false;
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
    const aedAppliedYes = document.getElementById("aed_applied_yes");
    const aedAppliedNo = document.getElementById("aed_applied_no");
    const aedAppliedDT = document.getElementById("aed_applied_dt_div");
    const pacemakerOnYes = document.getElementById("pacemaker_on_yes");
    const pacemakerOnNo = document.getElementById("pacemaker_on_no");
    const pacemakerOnDT = document.getElementById("pacemaker_on_dt_div");

    aedAppliedYes.addEventListener("change", function () {
        if (aedAppliedYes.checked) {
            aedAppliedDT.style.display = "block";
        } else {
            aedAppliedDT.style.display = "none";
        }
    });

    aedAppliedNo.addEventListener("change", function () {
        if (aedAppliedNo.checked) {
            aedAppliedDT.style.display = "none";
        }
    });

    pacemakerOnYes.addEventListener("change", function () {
        if (pacemakerOnYes.checked) {
            pacemakerOnDT.style.display = "block";
        } else {
            pacemakerOnDT.style.display = "none";
        }
    });

    pacemakerOnNo.addEventListener("change", function () {
        if (pacemakerOnNo.checked) {
            pacemakerOnDT.style.display = "none";
        }
    });
});
</script>
@endsection

