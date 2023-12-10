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
          <h1 class="display-4">Initial Resuscitation</h1>
          <p class="lead">Airway/Ventilation and Circulation</p>
        </div>
      </div>
    </div>
  </div>
</div>
            
<div class="fixed-header">
    <a class="btn btn-secondary" href="{{ route('maininformation', ['code_number' => $code_number]) }}">Main Information</a>
    <a class="btn btn-secondary" style="color: #fff; background-color: #6c757d" href="{{ route('initialresuscitation', ['code_number' => $code_number]) }}">Initial Resuscitation</a>
    <a class="btn btn-secondary" href="{{ route('flowsheet', ['code_number' => $code_number]) }}">Flowsheet</a>
    <a class="btn btn-secondary" href="{{ route('outcome', ['code_number' => $code_number]) }}">Outcome of the Code</a>
    <a class="btn btn-secondary" href="{{ route('evaluation', ['code_number' => $code_number]) }}">Debriefing and Evaluation</a>
    <a class="btn btn-secondary" href="{{ route('codeteam', ['code_number' => $code_number]) }}">Code Team</a>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    
    <form method="POST" action="{{ route('store_initialresuscitation', ['code_number' => $code_number]) }}">
    @csrf
    <div class="card">
    <div class="card-header bg-secondary text-white py-2">Airway/Ventilation</div>
    <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="breathing_upon_ca">Breathing upon code activation:</label>
                    <select class="form-control" name="breathing_upon_ca" id="breathing_upon_ca">
                        @php
                            $selectedBreathing = old('breathing_upon_ca', optional($initialResuscitation ?? '' ?? '')->breathing_upon_ca ?? ''); 
                        @endphp

                        @foreach(['', 'Spontaneous', 'Apneic', 'Agonal', 'Assisted'] as $option)
                            <option value="{{ $option }}" {{ $selectedBreathing === $option ? 'selected' : '' }}>
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>
                </div>

                    <div class="form-group">
                        <label for="first_ventilation_dt">First Ventilation:</label>
                        <input type="datetime-local" class="form-control" name="first_ventilation_dt" value="{{ old('first_ventilation_dt', optional($initialResuscitation ?? '')->first_ventilation_dt ? (\Carbon\Carbon::parse($initialResuscitation['first_ventilation_dt'])->format('Y-m-d H:i:s')) : '') }}">
                    </div>

                    <div class="form-group">
                        <label for="ventilation">Ventilation via:</label>
                        <select class="form-control" name="ventilation" id="ventilation">
                            @php
                                $selectedVentilation = old('ventilation', optional($initialResuscitation ?? '' ?? '')->ventilation ?? ''); 
                            @endphp

                            @foreach(['', 'Bag-Valve Mask', 'Tracheostomy', 'Endotracheal Tube', 'Others'] as $option)
                                <option value="{{ $option }}" {{ $selectedVentilation === $option ? 'selected' : '' }}>
                                    {{ $option }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" id="othersText" style="display: none;">
                        <label for="other_ventilation">Other Ventilation Method:</label>
                        <input type="text" name="other_ventilation" id="other_ventilation" class="form-control" value="{{ old('other_ventilation', optional($initialResuscitation ?? '')->other_ventilation) }}">
                    </div>
                </div>

                <!-- Second Column -->
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="intubation_dt">Intubation:</label>
                        <input type="datetime-local" class="form-control" name="intubation_dt" value="{{ old('intubation_dt', optional($initialResuscitation ?? '')->intubation_dt ? (\Carbon\Carbon::parse($initialResuscitation['intubation_dt'])->format('Y-m-d H:i:s')) : '') }}">
                    </div>
                        
                    <div class="form-group">
                        <label for="et_tube_size">ET Tube Size:</label>
                        <input type="number" class="form-control" name="et_tube_size" placeholder="0" 
                        value="{{ $initialResuscitation ?? ''->et_tube_size ?? old('et_tube_size') }}"
                        step="0.1" min="0.0" max="11.0">
                    </div>

                    <div class="form-group">
                        <label for="intubation_attempts">Number of intubation attempts:</label>
                        <input type="number" class="form-control" name="intubation_attempts" placeholder="0"  value="{{ $initialResuscitation ?? ''->intubation_attempts ?? old('intubation_attempts') }}">
                    </div>
                
                    <div class="form-group">
                            <label for="et_tube_information">ET Tube Information</label>
                            <div id="et_tube_information">
                                <input type="checkbox" id="auscultation-checkbox" name="et_tube_information[]" value="Auscultation" {{ in_array('Auscultation', $etTubeInformation ?? []) ? 'checked' : '' }}>
                                <label for="auscultation-checkbox">Auscultation</label>

                                <input type="checkbox" id="exhaled-co2-checkbox" name="et_tube_information[]" value="Exhaled CO2" {{ in_array('Exhaled CO2', $etTubeInformation ?? []) ? 'checked' : '' }}>
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
                        <label for="first_documented_rhythm_dt">Comments/Remarks:</label>
                        <textarea class="form-control" name="first_documented_rhythm_dt">{{ old('first_documented_rhythm_dt', optional($initialResuscitation ?? '')->first_documented_rhythm_dt ?? '') }}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="first_pulseless_rhythm_dt">1st Pulseless Rhythm Detected Date/Time:</label>
                        <input type="datetime-local" class="form-control" name="first_pulseless_rhythm_dt" value="{{ old('first_pulseless_rhythm_dt', optional($initialResuscitation ?? '')->first_pulseless_rhythm_dt ? (\Carbon\Carbon::parse($initialResuscitation['first_pulseless_rhythm_dt'])->format('Y-m-d H:i:s')) : '') }}">
                    </div>

                    <div class="form-group">
                        <label for="compressions_dt">Compressions Started Date/Time:</label>
                        <input type="datetime-local" class="form-control" name="compressions_dt" value="{{ old('compressions_dt', optional($initialResuscitation ?? '')->compressions_dt ? (\Carbon\Carbon::parse($initialResuscitation['compressions_dt'])->format('Y-m-d H:i:s')) : '') }}">
                    </div>

                </div>

                <!-- Second Column -->
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="aed_applied">AED Applied:</label>
                        <label for="aed_applied_yes">
                            <input type="radio" name="aed_applied" value="Yes" id="aed_applied_yes" {{ old('aed_applied', optional($initialResuscitation ?? '')->aed_applied) === 'Yes' ? 'checked' : '' }}>
                            Yes
                        </label>
                        <label for="aed_applied_no">
                            <input type="radio" name="aed_applied" value="No" id="aed_applied_no" {{ old('aed_applied', optional($initialResuscitation ?? '')->aed_applied) === 'No' ? 'checked' : '' }}>
                            No
                        </label>
                        <div id ="aed_applied_dt_div" style="display: none;">
                            <label for="aed_applied_dt">Date/Time:</label>
                            <input type="datetime-local" class="form-control" name="aed_applied_dt" id="aed_applied_dt" value="{{ old('aed_applied_dt', optional($initialResuscitation ?? '')->aed_applied_dt ? (\Carbon\Carbon::parse($initialResuscitation['aed_applied_dt'])->format('Y-m-d H:i:s')) : '') }}">
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="pacemaker_on">Pacemaker on:</label>
                    <label for="pacemaker_on_yes">
                        <input type="radio" name="pacemaker_on" value="Yes" id="pacemaker_on_yes" {{ old('pacemaker_on', optional($initialResuscitation ?? '')->pacemaker_on) === 'Yes' ? 'checked' : '' }}>
                        Yes
                    </label>
                    <label for="pacemaker_on_no">
                        <input type="radio" name="pacemaker_on" value="No" id="pacemaker_on_no" {{ old('pacemaker_on', optional($initialResuscitation ?? '')->pacemaker_on) === 'No' ? 'checked' : '' }}>
                        No
                    </label>
                        <div id ="pacemaker_on_dt_div" style="display: none;">
                            <label for="pacemaker_on_dt">Date/Time:</label>
                            <input type="datetime-local" class="form-control" name="pacemaker_on_dt" id="pacemaker_on_dt" value="{{ old('pacemaker_on_dt', optional($initialResuscitation ?? '')->pacemaker_on_dt ? (\Carbon\Carbon::parse($initialResuscitation['pacemaker_on_dt'])->format('Y-m-d H:i:s')) : '') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

        <form action="{{ url('/store_initialresuscitation') }}" method="post">
            @csrf 
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
        </form>
</form> 

  </div>
</div>
</div>

<script>
    const ventilationSelect = document.getElementById('ventilation');
    const othersText = document.getElementById('othersText'); 
    const otherVentilationInput = document.getElementById('other_ventilation');

        function toggleFields() {
            const selectedValue = ventilationSelect.value; 

            if (selectedValue === 'Others') {
                othersText.style.display = 'block';
                otherVentilationInput.required = true;
            } else {
                othersText.style.display = 'none';
                otherVentilationInput.required = false;
            }
        }

        toggleFields(); // Initial toggle based on selected outcome

        ventilationSelect.addEventListener('change', toggleFields);

    document.addEventListener("DOMContentLoaded", function () {
    const aedAppliedYes = document.getElementById("aed_applied_yes");
    const aedAppliedNo = document.getElementById("aed_applied_no");
    const aedAppliedDT = document.getElementById("aed_applied_dt_div");
    const pacemakerOnYes = document.getElementById("pacemaker_on_yes");
    const pacemakerOnNo = document.getElementById("pacemaker_on_no");
    const pacemakerOnDT = document.getElementById("pacemaker_on_dt_div");

    aedAppliedNo.addEventListener("change", function () {
        setLocalStorageItem(aedAppliedNo.id, aedAppliedNo.checked);
        aedAppliedDT.style.display = aedAppliedNo.checked ? "none" : "block";
    });

    aedAppliedYes.addEventListener("change", function () {
        setLocalStorageItem(aedAppliedYes.id, aedAppliedYes.checked);
        aedAppliedDT.style.display = aedAppliedYes.checked ? "block" : "none";
    });

    pacemakerOnYes.addEventListener("change", function () {
        setLocalStorageItem(pacemakerOnYes.id, pacemakerOnYes.checked);
        pacemakerOnDT.style.display = pacemakerOnYes.checked ? "block" : "none";
    });

    pacemakerOnNo.addEventListener("change", function () {
        setLocalStorageItem(pacemakerOnNo.id, pacemakerOnNo.checked);
        pacemakerOnDT.style.display = pacemakerOnNo.checked ? "none" : "block";
    });


    function setLocalStorageItem(item, value) {
    localStorage.setItem(item, value);
}


    function getLocalStorageItem(item) {
        return item;
    }

    function handleCheckboxState(checkbox, explanationBox) {
        const isChecked = getLocalStorageItem(checkbox.id);
         if ( checkbox.checked === true) {    
            explanationBox.style.display = "block";
        } else {
            explanationBox.style.display = "none";
        }
        console.log(`explanationBox.style.display: ${explanationBox.style.display}`);
    }

    handleCheckboxState(aedAppliedYes, aedAppliedDT);
    handleCheckboxState(pacemakerOnYes, pacemakerOnDT);
});
</script>
@endsection