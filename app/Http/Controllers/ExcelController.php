<?php

namespace App\Http\Controllers;

use App\Exports\CodeBlueExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function export()
    {
        return Excel::download(new CodeBlueExport, 'CodeBlueReport.xlsx');
    }
}
