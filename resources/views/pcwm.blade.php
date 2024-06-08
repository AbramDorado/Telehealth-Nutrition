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
              <label for="target_weight_2">Target Weight</label>
              <input type="text" class="form-control" name="target_weight_2" id="target_weight_2">
            </div>

            <div class="form-group">
              <label for="target_date">Target Date</label>
              <input type="date" class="form-control" name="target_date" id="target_date">
            </div>

            <div class="form-group">
              <label for="starting_weight">Starting Weight</label>
              <input type="number" class="form-control" name="starting_weight" id="starting_weight">
            </div>

            <div class="form-group">
              <label for="starting_date">Starting Date</label>
              <input type="date" class="form-control" name="starting_date" id="starting_date">
            </div>

            <div class="form-group">
              <label for="weighing_day">Weighing Day, Every</label>
              <select class="form-control" name="weighing_day" id="weighing_day">
                <option value="monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
                <option value="friday">Friday</option>
                <option value="saturday">Saturday</option>
                <option value="sunday">Sunday</option>
              </select>
            </div>

            <div class="form-group">
              <label for="weighing_time">Weighing Time</label>
              <input type="time" class="form-control" name="weighing_time" id="weighing_time">
            </div>

            <h5 class="mt-4">Log Weekly Weight</h5>
            <div id="weight-log">
              <div class="form-group table-entry">
                <input type="date" class="form-control" name="date[]" placeholder="Date">
                <input type="number" class="form-control" name="weight[]" placeholder="Actual Weekly Weight (KG)">
                <input type="number" class="form-control" name="loss[]" placeholder="Loss">
                <input type="number" class="form-control" name="gain[]" placeholder="Gain">
              </div>
            </div>
            <button type="button" class="btn btn-secondary" id="add-row">Add</button>
          </div>

          <form action="{{ url('/store_codeteam') }}" method="post">
            @csrf 
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
          </form>
        </form>
      </form>
    </div>
  </div>
</div>

@endsection