@extends('layouts.master')

@section('content')
<div class="jumbotron">
  <h1 class="display-10">Flowsheet</h1>
  <p class="lead">Flowsheet and Medication</p>
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
    <a class="dropdown-item" href="{{ route('codeteam', ['code_number' => $code_number]) }}">Code Team</a>
  </div>
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
                <div class="col-md-8">
                
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
                                    <label for="bp_systolic">Blood Pressure, Systolic:</label>
                                    <input type="number" class="form-control" name="bp_systolic" placeholder="0">
                                </div>

                                <div class="form-group">
                                    <label for="bp_diastolic">Blood Pressure, Diastolic:</label>
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
                                        <label for="free1_label">[Free text medication #1]</span></label>
                                        <input type="text" class="form-control" name="free1_label" placeholder="[Free text medication #1]">
                                    </div>

                                    <div class="form-group">
                                        <label for="free1_dose">Dose</span></label>
                                        <input type="number" class="form-control" name="free1_dose" placeholder="0">    
                                    </div>

                                    <div class="form-group">
                                    <label for="free1_route">Route</label>
                                        <input type="text" class="form-control" name="free1_route">
                                    </div>

                                    <div class="form-group">
                                        <label for="free2_label">[Free text medication #2]</span></label>
                                        <input type="text" class="form-control" name="free2_label" placeholder="[Free text medication #2]">
                                    </div>

                                    <div class="form-group">
                                        <label for="free2_dose">Dose</span></label>
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

<script>
    document.getElementById('showTable').addEventListener('click', function () {
        $('#tableModal').modal('show');
    });
</script>


@endsection