<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function getNames() {
        $users = User::select('id', 'name')->get(); 
        return $users;
    }

    // ... other methods related to user
}

