<!-- This is codeteam.blade.php -->

@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Code Team</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store_codeteam') }}">
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

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
