@extends('layouts.master')

@section('content')
<div class="jumbotron">
  <h1 class="display-10">Debriefing and Evaluation</h1>
  <p class="lead">Debriefing and Evaluation</p>
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
    <a class="dropdown-item" href="/codeteam">Code Team</a>
  </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Questions</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store_evaluation', ['code_number' => $code_number]) }}">
                        @csrf

                        <div class="card mb-4">
                            <div class="card-header">Question 1</div>
                            <div class="card-body">
                                <p>Was the code conducted in accordance with the current algorithm?</p>
                                <label for="question1-yes">
                                    <input type="radio" name="question1" value="Yes" id="question1-yes">
                                    Yes
                                </label>
                                <label for="question1-no">
                                    <input type="radio" name="question1" value="No" id="question1-no">
                                    No
                                </label>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">Question 2</div>
                            <div class="card-body">
                                <p>Was there any problem with the response time of the team?</p>
                                <label for="question2-yes">
                                    <input type="radio" name="question2" value="Yes" id="question2-yes">
                                    Yes
                                </label>
                                <label for="question2-no">
                                    <input type="radio" name="question2" value="No" id="question2-no">
                                    No
                                </label>
                                <div id="question2-explanation" style="display: none;">
                                    <textarea name="question2_explanation" placeholder="Add an explanation (if necessary)"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">Question 3</div>
                            <div class="card-body">
                                <p>Were there any problems with equipment, supplies, or tests?</p>
                                <label for="question3-yes">
                                    <input type="radio" name="question3" value="Yes" id="question3-yes">
                                    Yes
                                </label>
                                <label for="question3-no">
                                    <input type="radio" name="question3" value="No" id="question3-no">
                                    No
                                </label>

                                <div id="question3-details" style="display: none;">
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
                            <div class="card-header">Question 4</div>
                            <div class="card-body">
                                <p>Were policies and procedures followed?</p>
                                <label for="question4-yes">
                                    <input type="radio" name="question4" value="Yes" id="question4-yes">
                                    Yes
                                </label>
                                <label for="question4-no">
                                    <input type="radio" name="question4" value="No" id="question4-no">
                                    No
                                </label>
                                <div id="question4-explanation" style="display: none;">
                                    <textarea name="question4_explanation" placeholder="Add an explanation (if necessary)"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">Question 5</div>
                            <div class="card-body">
                                <p>Were there any problems during the code?</p>
                                <label for="question5-yes">
                                    <input type="radio" name="question5" value="Yes" id="question5-yes">
                                    Yes
                                </label>
                                <label for="question5-no">
                                    <input type="radio" name="question5" value="No" id="question5-no">
                                    No
                                </label>
                                <div id="question5-explanation" style="display: none;">
                                    <textarea name="question5_explanation" placeholder="Add an explanation (if necessary)"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">Question 6</div>
                            <div class="card-body">
                                <p>Was family notified and updated on patient’s condition?</p>
                                <label for="question6-yes">
                                    <input type="radio" name="question6" value="Yes" id="question6-yes">
                                    Yes
                                </label>
                                <label for="question6-no">
                                    <input type="radio" name="question6" value="No" id="question6-no">
                                    No
                                </label>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">Question 7</div>
                            <div class="card-body">
                                <p>Other Remarks</p>
                                <div id="question7-explanation">
                                    <textarea name="question7_explanation" placeholder="Other remarks"></textarea>
                                </div>
                            </div>
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
    const question2Yes = document.getElementById("question2-yes");
    const question2No = document.getElementById("question2-no");
    const question3Yes = document.getElementById("question3-yes");
    const question3No = document.getElementById("question3-no");
    const question4Yes = document.getElementById("question4-yes");
    const question4No = document.getElementById("question4-no");
    const question5Yes = document.getElementById("question5-yes");
    const question5No = document.getElementById("question5-no");
    const question2explanationBox = document.getElementById("question2-explanation");
    const question3Details = document.getElementById("question3-details");
    const question4explanationBox = document.getElementById("question4-explanation");
    const question5explanationBox = document.getElementById("question5-explanation");

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
