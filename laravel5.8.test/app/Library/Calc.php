<?php

namespace App\Library;


class Calc
{
    protected $total;

    public function __construct($total = 0)
    {
        return $this->total = $total;
    }

    public static function create($total=0) {
        return new self($total);
    }

    public function add($amount) {
        $this->total += $amount;
        return $this;
    }

    public function sub($amount) {
        $this->total -= $amount;
        return $this;
    }
    

    public function mult($amount) {
        $this->total *= $amount;
        return $this;
    }

    public function div($amount) {
        $this->total /= $amount;
        return $this;
    }

    public function result() {
        return $this->total;
    }
}
