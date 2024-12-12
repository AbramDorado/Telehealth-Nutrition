<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JitsiController extends Controller
{
    public function createRoom()
    {
        // Generate a unique room name or fetch it from a database
        $roomName = 'meeting_' . uniqid();
        
        // Pass the room name to the view
        return view('jitsi-meeting', compact('roomName'));
    }
}
