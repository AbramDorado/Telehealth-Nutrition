<!-- This is codeteam.blade.php -->

@extends('layouts.master')

@section('content')
<div class="jumbotron">
  <h1 class="display-10">Code Team</h1>
  <p class="lead">Code Team</p>
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Code Team</div>
                <div class="card-body">
                   
                <form method="POST" action="{{ route('store_codeteam', ['code_number' => $code_number]) }}">
    @csrf
                        <div class="form-group">
                        <label for="code_team_leader">Code Team Leader:</label>
                            <select class="form-control" name="code_team_leader" id="code_team_leader">
                                <option value="" disabled selected>Select</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="code_team_co_leader">Code Team Co-Leader:</label>
                            <select class="form-control" name="code_team_co_leader" id="code_team_co_Leader">
                                <option value="" disabled selected>Select</option>
                                <option value="-1">None</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recorder">Recorder:</label>
                            <select class="form-control" name="recorder" id="recorder">
                                <option value="" disabled selected>Select</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="code_team_member">Code Team Member:</label>
                                @foreach($users as $user)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="code_team_member[]" value="{{ $user->name }}" id="user{{ $user->name }}">
                                    <label class="form-check-label" for="user{{ $user->name }}">
                                        {{ $user->name }}
                                    </label>
                                </div>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="intubated_by">Intubated by:</label>
                            <select class="form-control" name="intubated_by" id="intubated_by">
                                <option value="" disabled selected>Select</option>
                                <option value="-1">None</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <form action="{{ url('/store_codeteam') }}" method="post">
                    @csrf 
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
</form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
