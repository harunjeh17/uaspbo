<?php

abstract class Topping
{
    protected $amount = 0;
    protected $price = 0;
    protected $cost = 0;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function calculate()
    {
        $this->cost = $this->price * $this->amount;
    }

    abstract public static function getName();
}
