<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::all(); // Fetch all meetings
        return view('meetings.index', compact('meetings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $roomName = 'meeting_' . uniqid(); // Generate unique Jitsi room name

        Meeting::create([
            'title' => $request->title,
            'room_name' => $roomName,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('meetings.index')->with('success', 'Meeting scheduled successfully!');
    }

    public function destroy($id)
    {
        $meeting = Meeting::findOrFail($id); // Find the meeting by ID
        $meeting->delete(); // Delete the meeting

        return redirect()->route('meetings.index')->with('success', 'Meeting deleted successfully!');
    }

    public function list()
    {
        $meetings = Meeting::all(); // Retrieve all meetings
        return view('meetings.list', compact('meetings'));
    }
}