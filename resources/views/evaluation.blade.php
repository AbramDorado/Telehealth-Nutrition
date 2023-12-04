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

                        <div class="card mb-4">
                            <div class="card-header bg-secondary text-white py-2">Question 1</div>
                            <div class="card-body">
                                <p>Was the code conducted in accordance with the current algorithm?</p>
                                <label for="question1_yes">
                                    <input type="radio" name="question1" value="Yes" id="question1_yes" {{ old('question1', optional($questions ?? '')->question1) === 'Yes' ? 'checked' : '' }}>
                                    Yes
                                </label>

                                <label for="question1_no">
                                <input type="radio" name="question1" value="Yes" id="question1_no" {{ old('question1', optional($questions ?? '')->question1) === 'No' ? 'checked' : '' }}>
                                    No
                                </label>

                            </div>
                        </div>

                        <div class="card mb-4">
                        <div class="card-header bg-secondary text-white py-2">Question 2</div>
                            <div class="card-body">
                                <p>Was there any problem with the response time of the team?</p>
                                <label for="question2_yes">
                                    <input type="radio" name="question2" value="Yes" id="question2_yes" {{ old('question2', optional($questions ?? '')->question2) === 'Yes' ? 'checked' : '' }}>
                                    Yes
                                </label>
                                <label for="question2_no">
                                    <input type="radio" name="question2" value="No" id="question2_no" {{ old('question2', optional($questions ?? '')->question2) === 'No' ? 'checked' : '' }}>
                                    No
                                </label>
                                <div id="question2_1" style="display: none;">
                                    <textarea name="question2_1" placeholder="Add an explanation (if necessary)">{{ old('question2_1', optional($questions ?? '')->question2_1 ?? '') }}</textarea>
                                </div>

                            </div>
                        </div>

                        <div class="card mb-4">
                        <div class="card-header bg-secondary text-white py-2">Question 3</div>
                            <div class="card-body">
                                <p>Were there any problems with equipment, supplies, or tests?</p>
                                <label for="question3_yes">
                                    <input type="radio" name="question3" value="Yes" id="question3_yes" {{ old('question3', optional($questions ?? '')->question3) === 'Yes' ? 'checked' : '' }}>
                                    Yes
                                </label>
                                <label for="question3_no">
                                    <input type="radio" name="question3" value="No" id="question3_no" {{ old('question3', optional($questions ?? '')->question3) === 'No' ? 'checked' : '' }}>
                                    No
                                </label>

                                <div id="question3_details" style="display: none;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Equipment/Supplies</th>
                                                <th>Condition</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>IV Supplies</td>
                                                <td>
                                                    <select name="question3_1">
                                                        <option value="No problem encountered">No problem encountered</option>
                                                        <option value="Absent">Absent</option>
                                                        <option value="Malfunctioning">Malfunctioning</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Central Line Kit</td>
                                                <td>
                                                    <select name="question3_2">
                                                        <option value="No problem encountered">No problem encountered</option>
                                                        <option value="Absent">Absent</option>
                                                        <option value="Malfunctioning">Malfunctioning</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Suction</td>
                                                <td>
                                                    <select name="question3_3">
                                                        <option value="No problem encountered">No problem encountered</option>
                                                        <option value="Absent">Absent</option>
                                                        <option value="Malfunctioning">Malfunctioning</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Medications</td>
                                                <td>
                                                    <select name="question3_4">
                                                        <option value="No problem encountered">No problem encountered</option>
                                                        <option value="Absent">Absent</option>
                                                        <option value="Malfunctioning">Malfunctioning</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ECG monitor</td>
                                                <td>
                                                    <select name="question3_5">
                                                        <option value="No problem encountered">No problem encountered</option>
                                                        <option value="Absent">Absent</option>
                                                        <option value="Malfunctioning">Malfunctioning</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Defibrillator</td>
                                                <td>
                                                    <select name="question3_6">
                                                        <option value="No problem encountered">No problem encountered</option>
                                                        <option value="Absent">Absent</option>
                                                        <option value="Malfunctioning">Malfunctioning</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>External pacemaker</td>
                                                <td>
                                                    <select name="question3_7">
                                                        <option value="No problem encountered">No problem encountered</option>
                                                        <option value="Absent">Absent</option>
                                                        <option value="Malfunctioning">Malfunctioning</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Pacing or defibrillator pad</td>
                                                <td>
                                                    <select name="question3_8">
                                                        <option value="No problem encountered">No problem encountered</option>
                                                        <option value="Absent">Absent</option>
                                                        <option value="Malfunctioning">Malfunctioning</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Intubation supplies</td>
                                                <td>
                                                    <select name="question3_9">
                                                        <option value="No problem encountered">No problem encountered</option>
                                                        <option value="Absent">Absent</option>
                                                        <option value="Malfunctioning">Malfunctioning</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Bag-Valve mask</td>
                                                <td>
                                                    <select name="question3_10">
                                                        <option value="No problem encountered">No problem encountered</option>
                                                        <option value="Absent">Absent</option>
                                                        <option value="Malfunctioning">Malfunctioning</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oxygen supplies</td>
                                                <td>
                                                    <select name="question3_11">
                                                        <option value="No problem encountered">No problem encountered</option>
                                                        <option value="Absent">Absent</option>
                                                        <option value="Malfunctioning">Malfunctioning</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Laboratory results</td>
                                                <td>
                                                    <select name="question3_12">
                                                        <option value="No problem encountered">No problem encountered</option>
                                                        <option value="Absent">Absent</option>
                                                        <option value="Malfunctioning">Malfunctioning</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Chest x-ray</td>
                                                <td>
                                                    <select name="question3_13">
                                                        <option value="No problem encountered">No problem encountered</option>
                                                        <option value="Absent">Absent</option>
                                                        <option value="Malfunctioning">Malfunctioning</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Others</td>
                                                <td>
                                                    <textarea name="question3_14" placeholder="Enter details"></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <div class="card mb-4">
                        <div class="card-header bg-secondary text-white py-2">Question 4</div>
                            <div class="card-body">
                                <p>Were policies and procedures followed?</p>
                                <label for="question4_yes">
                                    <input type="radio" name="question4" value="Yes" id="question4_yes"  {{ old('question4', optional($questions ?? '')->question4) === 'Yes' ? 'checked' : '' }}>
                                    Yes
                                </label>
                                <label for="question4_no">
                                    <input type="radio" name="question4" value="No" id="question4_no"  {{ old('question4', optional($questions ?? '')->question4) === 'No' ? 'checked' : '' }}>
                                    No
                                </label>
                                <div id="question4_1" style="display: none;">
                                <textarea name="question4_1" placeholder="Add an explanation (if necessary)">{{ old('question4_1', optional($questions ?? '')->question4_1 ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                        <div class="card-header bg-secondary text-white py-2">Question 5</div>
                            <div class="card-body">
                                <p>Were there any problems during the code?</p>
                                <label for="question5_yes">
                                    <input type="radio" name="question5" value="Yes" id="question5_yes" {{ old('question5', optional($questions ?? '')->question5) === 'Yes' ? 'checked' : '' }}>
                                    Yes
                                </label>
                                <label for="question5_no">
                                    <input type="radio" name="question5" value="No" id="question5_no"  {{ old('question5', optional($questions ?? '')->question5) === 'No' ? 'checked' : '' }}>
                                    No
                                </label>
                                <div id="question5_1" style="display: none;">
                                <textarea name="question5_1" placeholder="Add an explanation (if necessary)">{{ old('question5_1', optional($questions ?? '')->question5_1 ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                        <div class="card-header bg-secondary text-white py-2">Question 6</div>
                            <div class="card-body">
                                <p>Was family notified and updated on patient’s condition?</p>
                                <label for="question6_yes">
                                    <input type="radio" name="question6" value="Yes" id="question6_yes" {{ old('question6', optional($questions ?? '')->question6) === 'Yes' ? 'checked' : '' }}>
                                    Yes
                                </label>
                                <label for="question6_no">
                                    <input type="radio" name="question6" value="No" id="question6_no" {{ old('question6', optional($questions ?? '')->question6) === 'No' ? 'checked' : '' }}>
                                    No
                                </label>
                            </div>
                        </div>

                        <div class="card mb-4">
                        <div class="form-group">
                                    <label for="question7_explanation">Other Remarks:</label>
                                    <textarea class="form-control" name="question7_explanation">{{ old('question7_explanation', optional($questions ?? '')->question7_explanation ?? '') }}</textarea>
                        </div>

                        <form action="{{ url('/store_codeteam') }}" method="post">
                    @csrf 
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
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
    const question4Yes = document.getElementById("question4_yes");
    const question4No = document.getElementById("question4_no");
    const question5Yes = document.getElementById("question5_yes");
    const question5No = document.getElementById("question5_no");
    const question3Details = document.getElementById("question3_details");
    const question4explanationBox = document.getElementById("question4_1");
    const question5explanationBox = document.getElementById("question5_1");

    question2Yes.addEventListener("change", function () {
        if (question2Yes.checked) {
            question2explanationBox.style.display = "block";
        } else {
            question2explanationBox.style.display = "none";
        }
    });

    question2No.addEventListener("change", function () {
        if (question2No.checked) {
            question2explanationBox.style.display = "none";
        }
    });

    question3Yes.addEventListener("change", function () {
        if (question3Yes.checked) {
            question3Details.style.display = "block";
        } else {
            question3Details.style.display = "none";
        }
    });

    question3No.addEventListener("change", function () {
        if (question3No.checked) {
            question3Details.style.display = "none";
        }
    });

    question4No.addEventListener("change", function () {
        if (question4No.checked) {
            question4explanationBox.style.display = "block";
        } else {
            question4explanationBox.style.display = "none";
        }
    });

    question4Yes.addEventListener("change", function () {
        if (question4Yes.checked) {
            question4explanationBox.style.display = "none";
        }
    });

    question5Yes.addEventListener("change", function () {
        if (question5Yes.checked) {
            question5explanationBox.style.display = "block";
        } else {
            question5explanationBox.style.display = "none";
        }
    });

    question5No.addEventListener("change", function () {
        if (question5No.checked) {
            question5explanationBox.style.display = "none";
        }
    });
});
</script>

@endsection
