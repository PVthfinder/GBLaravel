<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Library\Calc;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Calc_works_correct extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function calc_works_correct()
    {
        $int = 56;

        $calc = Calc::create(10)->div(5)->add(3)->mult(10)->sub(4);

        $this->assertTrue($int, $calc->result());
    }
}
