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
          <h1 class="display-10">Debriefing and Evaluation</h1>
          <p class="lead">Debriefing and Evaluation</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="fixed-header">
    <a class="btn btn-secondary" href="{{ route('maininformation', ['code_number' => $code_number]) }}">Main Information</a>
    <a class="btn btn-secondary" href="{{ route('initialresuscitation', ['code_number' => $code_number]) }}">Initial Resuscitation</a>
    <a class="btn btn-secondary" href="{{ route('flowsheet', ['code_number' => $code_number]) }}">Flowsheet</a>
    <a class="btn btn-secondary" href="{{ route('outcome', ['code_number' => $code_number]) }}">Outcome of the Code</a>
    <a class="btn btn-secondary" style="color: #fff; background-color: #6c757d" href="{{ route('evaluation', ['code_number' => $code_number]) }}">Debriefing and Evaluation</a>
    <a class="btn btn-secondary" href="{{ route('codeteam', ['code_number' => $code_number]) }}">Code Team</a>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form method="POST" action="{{ route('store_evaluation', ['code_number' => $code_number]) }}">
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

<script>
document.addEventListener("DOMContentLoaded", function () {
    const question2Yes = document.getElementById("question2_yes");
    const question2No = document.getElementById("question2_no");
    const question2explanationBox = document.getElementById("question2_1");
    const question3Yes = document.getElementById("question3_yes");
    const question3No = document.getElementById("question3_no");
    const question3Details = document.getElementById("question3_details");
    const question4Yes = document.getElementById("question4_yes");
    const question4No = document.getElementById("question4_no");
    const question4explanationBox = document.getElementById("question4_1");
    const question5Yes = document.getElementById("question5_yes");
    const question5No = document.getElementById("question5_no");
    const question5explanationBox = document.getElementById("question5_1");

    question2No.addEventListener("change", function () {
        setLocalStorageItem(question2No.id, question2No.checked);
        question2explanationBox.style.display = question2No.checked ? "none" : "block";
    });

    question2Yes.addEventListener("change", function () {
        setLocalStorageItem(question2Yes.id, question2Yes.checked);
        question2explanationBox.style.display = question2Yes.checked ? "block" : "none";
    });

    question3No.addEventListener("change", function () {
        setLocalStorageItem(question3No.id, question3No.checked);
        question3Details.style.display = question3No.checked ? "none" : "block";
    });

    question3Yes.addEventListener("change", function () {
        setLocalStorageItem(question3Yes.id, question3Yes.checked);
        question3Details.style.display = question3Yes.checked ? "block" : "none";
    });

    question4Yes.addEventListener("change", function () {
        setLocalStorageItem(question4Yes.id, question4Yes.checked);
        question4explanationBox.style.display = question4Yes.checked ? "none" : "block";
    });

    question4No.addEventListener("change", function () {
        setLocalStorageItem(question4No.id, question4No.checked);
        question4explanationBox.style.display = question4No.checked ? "block" : "none";
    });

    question5Yes.addEventListener("change", function () {
        setLocalStorageItem(question5Yes.id, question5Yes.checked);
        question5explanationBox.style.display = question5Yes.checked ? "block" : "none";
    });

    question5No.addEventListener("change", function () {
        setLocalStorageItem(question5No.id, question5No.checked);
        question5explanationBox.style.display = question5No.checked ? "none" : "block";
    });

    function setLocalStorageItem(item, value) {
        localStorage.setItem(item, value);
    }

    function getLocalStorageItem(item) {
        return localStorage.getItem(item) === 'true';
    }

    function handleCheckboxState(checkbox, explanationBox) {
        const isChecked = getLocalStorageItem(checkbox.id);
        checkbox.checked = isChecked;
        explanationBox.style.display = isChecked ? "block" : "none";
    }

    handleCheckboxState(question2Yes, question2explanationBox);
    handleCheckboxState(question3Yes, question3Details);
    handleCheckboxState(question4No, question4explanationBox);
    handleCheckboxState(question5Yes, question5explanationBox);
});
</script>
@endsection