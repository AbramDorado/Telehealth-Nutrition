<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CodeBlueActivation;

class CodeBlueActivationController extends Controller
{
    public function storeOrUpdate(Request $request, $code_number)
    {
        $existingCodeBlueActivation = CodeBlueActivation::where('code_number', $code_number)->first();

        if ($existingCodeBlueActivation) {
            return $this->updateCodeBlueActivation($request, $code_number);
        }

        $codeBlueActivation = new CodeBlueActivation;
        $codeBlueActivation->fill($request->all());
        $codeBlueActivation->code_number = $code_number;
        $codeBlueActivation->save();

        return view('initialresuscitation', ['code_number' => $code_number]);
    }

    private function updateCodeBlueActivation(Request $request, $code_number)
    {
        $codeBlueActivation = CodeBlueActivation::findOrFail($code_number);
        $codeBlueActivation->fill($request->all());
        $codeBlueActivation->save();

        return view('initialresuscitation', ['code_number' => $code_number]);
    }
}
