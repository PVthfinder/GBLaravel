<?php

namespace App\Library;

use App\Library\Calc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseCalcController extends Controller
{
    protected $calc;

    public function __construct()
    {
        return $this->calc = Calc::create();
    }
}
