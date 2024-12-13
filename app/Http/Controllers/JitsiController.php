<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JitsiController extends Controller
{
    public function createRoom()
    {
        $roomName = $request->room ?? 'default_meeting_room';
        return view('jitsi-meeting', compact('roomName'));
    }
}
