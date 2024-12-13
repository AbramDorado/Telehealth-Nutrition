@extends('layouts.master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Meeting Scheduler</h1>

    <!-- Form to Add a Meeting -->
    <form method="POST" action="{{ route('meetings.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Meeting Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Schedule Meeting</button>
    </form>

    <!-- Calendar -->
    <div id="calendar" class="mt-4"></div>

    <!-- Meeting List -->
    <h2 class="mt-4">Existing Meetings</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($meetings as $meeting)
            <tr>
                <td>{{ $meeting->title }}</td>
                <td>{{ $meeting->start_time }}</td>
                <td>{{ $meeting->end_time }}</td>
                <td>
                    <!-- Delete Form -->
                    <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this meeting?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: {!! json_encode($meetings->map(function($meeting) {
                return [
                    'title' => $meeting->title,
                    'start' => $meeting->start_time,
                    'end' => $meeting->end_time,
                    'url' => url('jitsi-meeting?room=' . $meeting->room_name),
                ];
            })->toArray()) !!}, // Ensure toArray() is used
        });
        calendar.render();
    });
</script>
@endsection
