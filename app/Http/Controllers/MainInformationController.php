<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainInformationController extends Controller
{
    public function store(Request $request)
    {
        // Process and store patient information from $request

        // Redirect to a new page (e.g., confirmation page)
        return redirect()->route('confirmation_page');
    }
}
