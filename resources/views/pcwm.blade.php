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
          <h1 class="display-10">P.C.W.M.</h1>
          <p class="lead">P.C.W.M.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="fixed-header">
    <a class="btn btn-secondary" href="{{ route('patientinformation', ['patient_number' => $patient_number]) }}">Patient Information</a>
    <a class="btn btn-secondary" href="{{ route('soap', ['patient_number' => $patient_number]) }}">S.O.A.P.</a>
    <a class="btn btn-secondary" href="{{ route('labrequest', ['patient_number' => $patient_number]) }}">Lab Test Requests</a>
    <a class="btn btn-secondary" href="{{ route('diethistory', ['patient_number' => $patient_number]) }}">Diet History</a>
    <a class="btn btn-secondary" style="color: #fff; background-color: #6c757d" href="{{ route('pcwm', ['patient_number' => $patient_number]) }}">P.C.W.M.</a>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form method="POST" action="{{ route('store_pcwm', ['patient_number' => $patient_number]) }}">
        @csrf
        <div class="card mt-4">
          <div class="card-header bg-secondary text-white py-2">Progress Chart for Weight Management</div>
          <div class="card-body">
            <div class="form-group">
              <label for="target_weight_2">Target Weight (kg)</label>
              <input type="text" class="form-control" name="target_weight_2" id="target_weight_2" placeholder="e.g. 65" value="{{ old('target_weight_2', $pcwm->target_weight_2 ?? '') }}">
            </div>

            <div class="form-group">
              <label for="target_date">Target Date</label>
              <input type="date" class="form-control" name="target_date" id="target_date" value="{{ $pcwm->target_date ?? '' }}">
            </div>

            <div class="form-group">
              <label for="starting_weight">Starting Weight</label>
              <input type="number" class="form-control" name="starting_weight" id="starting_weight" placeholder="e.g. 70" value="{{ old('starting_weight', $pcwm->starting_weight ?? '') }}">
            </div>

            <div class="form-group">
              <label for="starting_date">Starting Date</label>
              <input type="date" class="form-control" name="starting_date" id="starting_date" value="{{ old('starting_date', $pcwm->starting_date ?? '') }}">
              </div>

            <div class="form-group">
              <label for="weighing_day">Weighing Day, Every</label>
              <select class="form-control" name="weighing_day" id="weighing_day">
                <option value="monday" {{ old('weighing_day', $pcwm->weighing_day ?? '') == 'monday' ? 'selected' : '' }}>Monday</option>
                <option value="tuesday" {{ old('weighing_day', $pcwm->weighing_day ?? '') == 'tuesday' ? 'selected' : '' }}>Tuesday</option>
                <option value="wednesday" {{ old('weighing_day', $pcwm->weighing_day ?? '') == 'wednesday' ? 'selected' : '' }}>Wednesday</option>
                <option value="thursday" {{ old('weighing_day', $pcwm->weighing_day ?? '') == 'thursday' ? 'selected' : '' }}>Thursday</option>
                <option value="friday" {{ old('weighing_day', $pcwm->weighing_day ?? '') == 'friday' ? 'selected' : '' }}>Friday</option>
                <option value="saturday" {{ old('weighing_day', $pcwm->weighing_day ?? '') == 'saturday' ? 'selected' : '' }}>Saturday</option>
                <option value="sunday" {{ old('weighing_day', $pcwm->weighing_day ?? '') == 'sunday' ? 'selected' : '' }}>Sunday</option>
              </select>
            </div>

            <div class="form-group">
              <label for="weighing_time">Weighing Time</label>
              <input type="time" class="form-control" name="weighing_time" id="weighing_time" value="{{ old('weighing_time', $pcwm->weighing_time ?? '') }}">
            </div>

            <h5 class="mt-4">Log Weekly Weight</h5>
            @if(isset($pcwm) && $pcwm->logs->isNotEmpty())
            <button type="button" class="btn btn-info mt-4" data-toggle="collapse" data-target="#logsTable">Show Logs</button>
            <div id="logsTable" class="collapse mt-2">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Actual Weekly Weight (KG)</th>
                    <th>Loss</th>
                    <th>Gain</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pcwm->logs as $log)
                    <tr>
                      <td>{{ $log->pcwm2_dt }}</td>
                      <td>{{ $log->actual_weekly_weight }}</td>
                      <td>{{ $log->loss }}</td>
                      <td>{{ $log->gain }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @endif
            <div id="weight-log">
              @if(isset($pcwm) && $pcwm->logs->isNotEmpty())
                @foreach($pcwm->logs as $log)
                <br>
                  <div class="form-group table-entry">
                    <input type="date" class="form-control" name="pcwm2_dt[]" placeholder="Date" value="{{ $log->pcwm2_dt }}">
                    <input type="number" class="form-control" name="weight[]" placeholder="Actual Weekly Weight (KG)" value="{{ $log->actual_weekly_weight }}">
                    <input type="number" class="form-control" name="loss[]" placeholder="Loss" value="{{ $log->loss }}">
                    <input type="number" class="form-control" name="gain[]" placeholder="Gain" value="{{ $log->gain }}">
                  </div>
                @endforeach
              @else
                <div class="form-group table-entry">
                  <input type="date" class="form-control" name="pcwm2_dt[]" placeholder="Date">
                  <input type="number" class="form-control" name="weight[]" placeholder="Actual Weekly Weight (KG)">
                  <input type="number" class="form-control" name="loss[]" placeholder="Loss">
                  <input type="number" class="form-control" name="gain[]" placeholder="Gain">
                </div>
              @endif
            </div>
            <button type="button" class="btn btn-secondary" id="add-row">Add</button>
          </div>
        </div>
        <button type="submit" class="btn btn-block" style="background-color: #EC674A; border-color: #EC674A; font-size: 20px; padding: 15px 20px;"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
      </form>

    </div>
  </div>
</div>

<script>
  document.getElementById('add-row').addEventListener('click', function() {
      var weightLog = document.getElementById('weight-log');
      var newRow = document.createElement('div');
      newRow.classList.add('form-group', 'table-entry');
      newRow.innerHTML = `
          <input type="date" class="form-control" name="pcwm2_dt[]" placeholder="Date">
          <input type="number" class="form-control" name="weight[]" placeholder="Actual Weekly Weight (KG)">
          <input type="number" class="form-control" name="loss[]" placeholder="Loss">
          <input type="number" class="form-control" name="gain[]" placeholder="Gain">
      `;
      weightLog.appendChild(newRow);
  });
  </script>
@endsection