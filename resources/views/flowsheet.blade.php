@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="..." crossorigin="anonymous" />
<style>
    /* Style for the floating container */
    .floating-container {
        position: fixed;
        top: 50px; /* Adjust as needed */
        left: 50px; /* Adjust as needed */
        z-index: 1000;
    }

    /* Style for the timer container */
    .timer-container {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        cursor: move;
        position: absolute; /* Ensure the position is absolute */
        transition: box-shadow 0.3s ease-in-out; /* Smooth transition for box-shadow */
    }

    /* Style for indicating draggable on hover */
    .timer-container:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    /* Style for the timer header */
    .timer-header {
        font-size: 20px;
        margin-bottom: 10px;
        text-align: center;
    }

    /* Style for the elapsed time */
    .elapsed-time {
        font-size: 24px;
        text-align: center;
        margin-bottom: 15px;
    }

    /* Style for the timer buttons */
    .timer-buttons {
        display: flex;
        justify-content: center;
    }

    /* Style for the individual timer buttons */
    .timer-button {
        padding: 8px 15px;
        margin: 0 5px;
        font-size: 14px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    /* Style for the button hover effect */
    .timer-button:hover {
        background-color: #e0e0e0;
    }

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
  <h1 class="display-10">Flowsheet</h1>
  <p class="lead">Flowsheet and Medication</p>
        </div>
      </div>
    </div>
  </div>
</div>
            
<div class="fixed-header">
    <a class="btn btn-secondary" href="{{ route('maininformation', ['code_number' => $code_number]) }}">Main Information</a>
    <a class="btn btn-secondary" href="{{ route('initialresuscitation', ['code_number' => $code_number]) }}">Initial Resuscitation</a>
    <a class="btn btn-secondary" style="color: #fff; background-color: #6c757d" href="{{ route('flowsheet', ['code_number' => $code_number]) }}">Flowsheet</a>
    <a class="btn btn-secondary" href="{{ route('outcome', ['code_number' => $code_number]) }}">Outcome of the Code</a>
    <a class="btn btn-secondary" href="{{ route('evaluation', ['code_number' => $code_number]) }}">Debriefing and Evaluation</a>
    <a class="btn btn-secondary" href="{{ route('codeteam', ['code_number' => $code_number]) }}">Code Team</a>
</div>

<div class="row">
  <div class="col-auto">
    <button type="button" class="btn btn-success btn-sm" id="showTable">
      <i class="fas fa-table"></i>
    </button>
  </div>
  <div class="col-auto ml-auto">
    <form method="GET" action="{{ route('outcome', ['code_number' => $code_number ?? '']) }}">
      @csrf
      <button type="submit" class="btn btn-success btn-sm">
        <i class="fas fa-arrow-right"></i>
      </button>
    </form>
  </div>
</div>

<div id="formContainer">
    <form id="baseForm" method="POST" action="{{ route('store_flowsheet', ['code_number' => $code_number ?? '']) }}"> 
        @csrf
        <input type="hidden">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                
                <form method="POST" action="{{ route('store_flowsheet', ['code_number' => $code_number ?? '']) }}"> 
                @csrf

                <div class="card">
                <div class="card-header bg-secondary text-white py-2">Flowsheet</div>
                <div class="card-body">

                        <div class="row">
                            <!-- First Column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="breathing">Breathing:</label>
                                    <select name="breathing" class="form-control" id="breathing">
                                    @php
                                        $selectedBreathing = old('breathing', optional($flowsheet ?? '' ?? '')->breathing ?? ''); 
                                    @endphp

                                    @foreach(['', 'Spontaneous', 'Assisted'] as $option)
                                        <option value="{{ $option }}" {{ $selectedBreathing === $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="pulse">Pulse:</label>
                                    <select name="pulse" class="form-control">
                                        <option value="">Select an option</option>
                                        <option value="Spontaneous">Spontaneous</option>
                                        <option value="Assisted">Assisted</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="bp_systolic">Blood Pressure, Systolic (mmHg):</label>
                                    <input type="number" class="form-control" name="bp_systolic" placeholder="0">
                                </div>

                                <div class="form-group">
                                    <label for="bp_diastolic">Blood Pressure, Diastolic (mmHg):</label>
                                    <input type="number" class="form-control" name="bp_diastolic" placeholder="0">
                                </div>                
                            </div>

                            <!-- Second Column -->
                            
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="rhythm_on_check">Rhythm on Check</label>
                                    <select name="rhythm_on_check" id="rhythm_on_check" class="form-control">
                                        <option value="">Select an option</option>
                                        <option value="Ventricular Fibrillation (VF)">Ventricular Fibrillation (VF)</option>
                                        <option value="Pulseless Ventricular Tachycardia (pVT)">Pulseless Ventricular Tachycardia (pVT)</option>
                                        <option value="Asystole">Asystole</option>
                                        <option value="Pulseless Electrical Activity (PEA)">Pulseless Electrical Activity (PEA)</option>
                                        <option value="With Pulse">With Pulse</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="rhythm_with_pulse">Rhythm, with pulse:</label>
                                    <select name="rhythm_with_pulse" id="rhythm_with_pulse" class="form-control">
                                        <option value="">Select an option</option>
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

                                <div class="form-group">
                                    <label for="rhythm_intervention">Rhythm Intervention</label>
                                    <select name="rhythm_intervention" id="rhythm_intervention" class="form-control">
                                        <option value="">Select an option</option>
                                        <option value="Defibrillation">Defibrillation</option>
                                        <option value="Cardioversion">Cardioversion</option>
                                        <option value="None, continued chest compressions">None, continued chest compressions</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="joules">Joules:</label>
                                    <input type="number" class="form-control" name="joules" placeholder="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="card">
                <div class="card-header card-header bg-secondary text-white py-2">Medication</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- First Column -->
                                    <div class="form-group">
                                        <label for="epinephrine_dose">Epinephrine Dose Given:</label>
                                        <input type="number" class="form-control" name="epinephrine_dose" placeholder="0">
                                    </div>

                                    <div class="form-group">
                                    <label for="epinephrine_route">Epinephrine Route:</label>
                                        <select name="epinephrine_route" class="form-control">
                                            <option value="Intravenous">Intravenous</option>
                                            <option value="Intraosseous">Intraosseous</option>
                                            <option value="Endotracheal">Endotracheal</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="amiodarone_dose">Amiodarone Dose Given:</label>
                                        <input type="number" class="form-control" name="amiodarone_dose" placeholder="0">
                                    </div>

                                    <div class="form-group">
                                    <label for="amiodarone_route">Amiodarone Route:</label>
                                        <select name="amiodarone_route" class="form-control">
                                            <option value="Intravenous">Intravenous</option>
                                            <option value="Intraosseous">Intraosseous</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="lidocaine_dose">Lidocaine Dose Given:</label>
                                        <input type="number" class="form-control" name="lidocaine_dose" placeholder="0">
                                    </div>

                                    <div class="form-group">
                                    <label for="lidocaine_route">Lidocaine Route:</label>
                                        <select name="lidocaine_route" class="form-control">
                                            <option value="Intravenous">Intravenous</option>
                                            <option value="Intraosseous">Intraosseous</option>
                                        </select>
                                    </div>            
                                </div>

                                <!-- Second Column -->
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="free1_label">Other Medications (unit of measure)</span></label>
                                        <input type="text" class="form-control" name="free1_label" placeholder="[Free text medication #1]">
                                    </div>

                                    <div class="form-group">
                                        <label for="free1_dose">Dose (mg)</span></label>
                                        <input type="number" class="form-control" name="free1_dose" placeholder="0">    
                                    </div>

                                    <div class="form-group">
                                    <label for="free1_route">Route</label>
                                        <input type="text" class="form-control" name="free1_route">
                                    </div>

                                    <div class="form-group">
                                        <label for="free2_label">Other Medications (unit of measure)</span></label>
                                        <input type="text" class="form-control" name="free2_label" placeholder="[Free text medication #2]">
                                    </div>

                                    <div class="form-group">
                                        <label for="free2_dose">Dose (mg)</span></label>
                                        <input type="number" class="form-control" name="free2_dose" placeholder="0">    
                                    </div>

                                    <div class="form-group">
                                    <label for="free2_route">Route:</label>
                                        <input type="text" class="form-control" name="free2_route">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comments">Comments:</label>
                                    <textarea type="text" class="form-control" name="comments"></textarea>
                            </div>
                        </div>          
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="logButton">Log</button>
                    </form>    
                </div>
            </div>
        </div>
    </form>
</div>


<div class="modal fade" id="tableModal" tabindex="-1" role="dialog" aria-labelledby="tableModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tableModalLabel">Flowsheet Table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if($flowsheets ?? '' && $flowsheets ?? ''->count() > 0)
          <table class="table">
          <thead>
            <tr>
            <th>Breathing</th>
            <th>Pulse</th>
            <th>Blood Pressure, Systolic</th>
            <th>Blood Pressure, Diastolic</th>
            <th>Rhythm on check</th>
            <th>Rhythm with pulse</th>
            <th>Rhythm Intervention</th>
            <th>Joules</th>
            <th>Epinephrine Dose</th>
            <th>Epinephrine Route</th>
            <th>Amiodarone Dose</th>
            <th>Amiodarone Route</th>
            <th>Lidocaine Dose</th>
            <th>Lidocaine Route</th>
            <th>Free 1 Label</th>   
            <th>Free 1 Dose</th>
            <th>Free 1 Route</th>
            <th>Free 2 Label</th>
            <th>Free 2 Dose</th>
            <th>Free 2 Route</th>
            <th>Comments</th>   
            </tr>
        </thead>
        <tbody>
            @foreach ($flowsheets ?? '' ?? '' as $flowsheet)
            <tr>
                <td>{{ $flowsheet->breathing ?? '' }}</td>
                <td>{{ $flowsheet->pulse ?? '' }}</td>
                <td>{{ $flowsheet->bp_systolic ?? '' }}</td>
                <td>{{ $flowsheet->bp_diastolic ?? '' }}</td>
                <td>{{ $flowsheet->rhythm_on_check ?? '' }}</td>
                <td>{{ $flowsheet->rhythm_with_pulse ?? '' }}</td>
                <td>{{ $flowsheet->rhythm_intervention ?? '' }}</td>
                <td>{{ $flowsheet->joules ?? '' }}</td>
                <td>{{ $flowsheet->epinephrine_dose ?? '' }}</td>
                <td>{{ $flowsheet->epinephrine_route ?? '' }}</td>
                <td>{{ $flowsheet->amiodarone_dose ?? '' }}</td>
                <td>{{ $flowsheet->amiodarone_route ?? '' }}</td>
                <td>{{ $flowsheet->lidocaine_dose ?? '' }}</td>
                <td>{{ $flowsheet->lidocaine_route ?? '' }}</td>
                <td>{{ $flowsheet->free1_label ?? '' }}</td>
                <td>{{ $flowsheet->free1_dose ?? '' }}</td>
                <td>{{ $flowsheet->free1_route ?? '' }}</td>
                <td>{{ $flowsheet->free2_label ?? '' }}</td>
                <td>{{ $flowsheet->free2_dose ?? '' }}</td>
                <td>{{ $flowsheet->free2_route ?? '' }}</td>
                <td>{{ $flowsheet->comments ?? '' }}</td>
            </tr>
            @endforeach
        </tbody>
          </table>
        @else
          <p>No flowsheet data available.</p>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Add this inside your content section -->
<div class="floating-container">
    <div id="timerContainer" class="timer-container">
        <div class="icon-container">
            <i class="fas fa-arrows-alt" style=" display: flex; align-items: center; justify-content: center; margin-bottom: 10px; "></i>
        </div>
        <h3 class="timer-header">Timer</h3>
        <p id="elapsedTime" class="elapsed-time">00:00:00</p>
        <div class="timer-buttons">
            <button id="startStopButton" class="timer-button">Start</button>
            <button id="resetButton" class="timer-button">Reset</button>
        </div>
    </div>
</div>


<!-- Add this JavaScript at the end of your content section -->
<script>
    const timerContainer = document.getElementById('timerContainer');
    let offsetX, offsetY;
    let isDragging = false;

    timerContainer.addEventListener('mousedown', function (event) {
        event.preventDefault();
        offsetX = event.clientX - timerContainer.getBoundingClientRect().left;
        offsetY = event.clientY - timerContainer.getBoundingClientRect().top;
        isDragging = true;
    });

    document.addEventListener('mousemove', function (event) {
        if (isDragging) {
            event.preventDefault();
            const x = event.clientX - offsetX;
            const y = event.clientY - offsetY;

            timerContainer.style.left = `${x}px`;
            timerContainer.style.top = `${y}px`;
        }
    });

    document.addEventListener('mouseup', function () {
        isDragging = false;
    });

    let timerInterval = null;
    let timerRunning = false;
    let elapsedTime = 1;

    function startStopTimer() {
        if (!timerRunning) {
            startTimer();
            document.getElementById('startStopButton').textContent = 'Stop';
        } else {
            stopTimer();
            document.getElementById('startStopButton').textContent = 'Resume';
        }
    }

    function startTimer() {
        timerRunning = true;
        timerInterval = setInterval(() => {
            const hours = Math.floor(elapsedTime / 3600);
            const minutes = Math.floor((elapsedTime % 3600) / 60);
            const seconds = elapsedTime % 60;
            document.getElementById('elapsedTime').textContent = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            elapsedTime++;
        }, 1000);
    }

    function stopTimer() {
        clearInterval(timerInterval);
        timerRunning = false;
    }

    function resetTimer() {
        stopTimer();
        elapsedTime = 0;
        document.getElementById('elapsedTime').textContent = '00:00:00';
        document.getElementById('startStopButton').textContent = 'Start';
    }

    document.getElementById('startStopButton').addEventListener('click', startStopTimer);
    document.getElementById('resetButton').addEventListener('click', resetTimer);
</script>


<script>
    document.getElementById('showTable').addEventListener('click', function () {
        $('#tableModal').modal('show');
    });
</script>


@endsection