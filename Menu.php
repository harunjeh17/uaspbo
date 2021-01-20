<?php

require_once __DIR__ . "/Mesin.php";

abstract class Menu
{
    protected $price = 0;

    public function getPrice()
    {
        return $this->price;
    }

    public function optionalDiscount(Mesin $mesin)
    {
        //
    }

    abstract public static function getName();
}