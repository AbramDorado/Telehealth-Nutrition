@extends('layouts.master')

@section('content')
<style>
    #patientPinDropdown {
        position: absolute;
        z-index: 1000;
        width: 90%;
        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
    }

    .question-mark-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }

    #dropdownMenuButton {
        position: fixed;
        top: 100px;
        left: 20px;
        z-index: 1000;
    }

    .fixed-header {
        display: flex;
        text-align: center;
        justify-content: center;
        align-content: center;
        position: fixed;
        top: 70px;
        left: 0;
        right: 0;
        z-index: 1;
        background-color: #ECECF1;
        padding: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .fixed-header a.btn {
        width: 16%;
        margin-left: 5px;
    }

    .fixed-header a.btn.btn-secondary {
        background-color: #ECECF1;
        color: #000;
        border-color: #ECECF1;
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        margin-top: 1px;
    }

    .left-column, .right-column {
        flex: 1;
        padding: 10px;
    }

    .left-column {
        max-width: 300px;
    }

    .right-column {
        flex: 2;
    }

    .card {
        margin-bottom: 20px;
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
            <h1 class="display-10">Diet History</h1>
            <p class="lead">Diet History</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="fixed-header">
    <a class="btn btn-secondary" href="{{ route('patientinformation', ['patient_number' => $patient_number]) }}">Patient Information</a>
    <a class="btn btn-secondary" href="{{ route('soap', ['patient_number' => $patient_number]) }}">S.O.A.P.</a>
    <a class="btn btn-secondary" href="{{ route('labrequest', ['patient_number' => $patient_number]) }}">Lab Test Requests</a>
    <a class="btn btn-secondary" style="color: #fff; background-color: #6c757d" href="{{ route('diethistory', ['patient_number' => $patient_number]) }}">Diet History</a>
    <a class="btn btn-secondary" href="{{ route('pcwm', ['patient_number' => $patient_number]) }}">P.C.W.M.</a>
</div>

<form method="POST" action="{{ route('store_diethistory', ['patient_number' => $patient_number ?? '']) }}"> 
    @csrf
    <div class="container">
        <div class="left-column">
            <div class="card">
                <div class="card-header bg-secondary text-white py-2">Anthropometric Assessment</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="ht">Height (cm)</label>
                        <input type="text" class="form-control" name="ht" id="ht" value="{{ old('ht', optional($diethistory)->ht) }}">
                    </div>

                    <div class="form-group">
                        <label for="wt">Weight (kg)</label>
                        <input type="text" class="form-control" name="wt" id="wt" value="{{ old('wt', optional($diethistory)->wt) }}">
                    </div>

                    <div class="form-group">
                        <label for="waist_cir">Waist Circumference</label>
                        <input type="text" class="form-control" name="waist_cir" id="waist_cir" value="{{ old('waist_cir', optional($diethistory)->waist_cir) }}">
                    </div>

                    <div class="form-group">
                        <label for="body_fat">Body Fat %</label>
                        <input type="text" class="form-control" name="body_fat" id="body_fat" value="{{ old('body_fat', optional($diethistory)->body_fat) }}">
                    </div>

                    <div class="form-group">
                        <label for="bmi_2">BMI</label>
                        <input type="text" class="form-control" name="bmi_2" id="bmi_2" value="{{ old('bmi_2', optional($diethistory)->bmi_2) }}">
                    </div>

                    <div class="form-group">
                        <label for="dbw">DBW</label>
                        <input type="text" class="form-control" name="dbw" id="dbw" value="{{ old('dbw', optional($diethistory)->dbw) }}">
                    </div>

                    <div class="form-group">
                        <label for="dbw_range">DBW Range</label>
                        <input type="text" class="form-control" name="dbw_range" id="dbw_range" value="{{ old('dbw_range', optional($diethistory)->dbw_range) }}">
                    </div>

                    <div class="form-group">
                        <label for="case">Case</label>
                        <textarea type="text" class="form-control" name="case" id="case">{{ old('case', optional($diethistory)->case) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="diet_rx">Diet Rx</label>
                        <textarea type="text" class="form-control" name="diet_rx" id="diet_rx">{{ old('diet_rx', optional($diethistory)->diet_rx) }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-column">
            <div class="card">
                <div class="card-header bg-secondary text-white py-2">24 Hour Food Recall</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="food_recall_time">Date and Time</label>
                        <input type="datetime-local" class="form-control" name="food_recall_time" value="{{ old('food_recall_time', optional($diethistory ?? '')->food_recall_time ? (\Carbon\Carbon::parse($diethistory['food_recall_time'])->format('Y-m-d\TH:i')) : '') }}">
                    </div>

                    <div class="form-group">
                        <label for="where_eaten">Where Eaten</label>
                        <input type="text" class="form-control" name="where_eaten" id="where_eaten" value="{{ old('where_eaten', optional($diethistory)->where_eaten) }}">
                    </div>

                    <div class="form-group">
                        <label for="foods">Food/s</label>
                        <input type="text" class="form-control" name="foods" id="foods" value="{{ old('foods', optional($diethistory)->foods) }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ old('description', optional($diethistory)->description) }}">
                    </div>

                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" name="amount" id="amount" value="{{ old('amount', optional($diethistory)->amount) }}">
                    </div>

                    <div class="form-group">
                        <label for="food_taken">Was this food taken typical?</label>
                        <select name="food_taken" id="food_taken" class="form-control">
                            <option value="yes" {{ old('food_taken', optional($diethistory)->food_taken) == 'yes' ? 'selected' : '' }}>Yes</option>
                            <option value="no" {{ old('food_taken', optional($diethistory)->food_taken) == 'no' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="form-group" id="reason-container" style="{{ old('food_taken', optional($diethistory)->food_taken) == 'no' ? '' : 'display: none;' }}">
                        <label for="food_taken_1">If not, why?</label>
                        <input type="text" class="form-control" name="food_taken_1" id="food_taken_1" value="{{ old('food_taken_1', optional($diethistory)->food_taken_1) }}">
                    </div>

                    <div class="form-group">
                        <label for="exercise">Exercise (type, frequency, duration)</label>
                        <input type="text" class="form-control" name="exercise" id="exercise" value="{{ old('exercise', optional($diethistory)->exercise) }}">
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header bg-secondary text-white py-2">Nutrition Intervention</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="target_weight_1">Target Weight</label>
                        <input type="text" class="form-control" name="target_weight_1" id="target_weight_1" value="{{ old('target_weight_1', optional($diethistory)->target_weight_1) }}">
                    </div>

                    <div class="form-group">
                        <label for="weight_loss">Weight Loss</label>
                        <input type="text" class="form-control" name="weight_loss" id="weight_loss" value="{{ old('weight_loss', optional($diethistory)->weight_loss) }}">
                    </div>

                    <div class="form-group">
                        <label for="total_energy_allowance">Total Energy Allowance</label>
                        <input type="text" class="form-control" name="total_energy_allowance" id="total_energy_allowance" value="{{ old('total_energy_allowance', optional($diethistory)->total_energy_allowance) }}">
                    </div>

                    <h5 class="mt-4">Food Distribution</h5>

                    <div class="form-group">
                        <label for="vegetable_a">Vegetable A</label>
                        <input type="text" class="form-control" name="vegetable_a" id="vegetable_a" value="{{ old('vegetable_a', optional($diethistory)->vegetable_a) }}">
                    </div>

                    <div class="form-group">
                        <label for="vegetable_b">Vegetable B</label>
                        <input type="text" class="form-control" name="vegetable_b" id="vegetable_b" value="{{ old('vegetable_b', optional($diethistory)->vegetable_b) }}">
                    </div>

                    <div class="form-group">
                        <label for="fruit">Fruit</label>
                        <input type="text" class="form-control" name="fruit" id="fruit" value="{{ old('fruit', optional($diethistory)->fruit) }}">
                    </div>

                    <div class="form-group">
                        <label for="milk">Milk</label>
                        <input type="text" class="form-control" name="milk" id="milk" value="{{ old('milk', optional($diethistory)->milk) }}">
                    </div>

                    <div class="form-group">
                        <label for="rice">Rice</label>
                        <input type="text" class="form-control" name="rice" id="rice" value="{{ old('rice', optional($diethistory)->rice) }}">
                    </div>

                    <div class="form-group">
                        <label for="meat_a">Meat A</label>
                        <input type="text" class="form-control" name="meat_a" id="meat_a" value="{{ old('meat_a', optional($diethistory)->meat_a) }}">
                    </div>

                    <div class="form-group">
                        <label for="meat_b">Meat B</label>
                        <input type="text" class="form-control" name="meat_b" id="meat_b" value="{{ old('meat_b', optional($diethistory)->meat_b) }}">
                    </div>

                    <div class="form-group">
                        <label for="fat">Fat</label>
                        <input type="text" class="form-control" name="fat" id="fat" value="{{ old('fat', optional($diethistory)->fat) }}">
                    </div>

                    <div class="form-group">
                        <label for="sugar">Sugar</label>
                        <input type="text" class="form-control" name="sugar" id="sugar" value="{{ old('sugar', optional($diethistory)->sugar) }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
        </div>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const foodTaken = document.getElementById("food_taken");
        const reasonContainer = document.getElementById("reason-container");

        function toggleReasonField() {
            const selectedValue = foodTaken.value;
            if (selectedValue === "no") {
                reasonContainer.style.display = "block";
            } else {
                reasonContainer.style.display = "none";
            }
        }

        toggleReasonField(); // Initial toggle based on selected value

        foodTaken.addEventListener("change", toggleReasonField); // Event listener for select change
    });
</script>

<script>
    document.getElementById('ht').addEventListener('input', calculateBMI);
    document.getElementById('wt').addEventListener('input', calculateBMI);

    function calculateBMI() {
        const height = parseFloat(document.getElementById('ht').value);
        const weight = parseFloat(document.getElementById('wt').value);

        if (height && weight) {
            const bmi = (weight / ((height / 100) ** 2)).toFixed(2);
            document.getElementById('bmi_2').value = bmi;
        }
    }
</script>

@endsection