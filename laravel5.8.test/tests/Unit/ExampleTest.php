<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Library\Calc;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    public function can_it_instantinate_calc()
    {
        $int = 0;

        $calc = Calc::create(0);

        $this->assertInstanceOf(Calc::class, $calc);
        $this->assertTrue($int, $calc->result());
    }
}
