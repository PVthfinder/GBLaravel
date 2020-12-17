<?php

namespace App\Http\Controllers;

use App\Library\Calc;
use App\Library\Interfaces\CalcInterface;

class CalculatorController extends Controller
{
    public function index() {

        $calc = app(CalcInterface::class);

        dd($calc);

        $result = Calc::create(5)->add(10)->result();

        return view('calculator', [
            'result' => $result
        ]);
    }

    
}
