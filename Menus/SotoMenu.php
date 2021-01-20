<?php

require_once __DIR__ . "/Menu.php";
require_once __DIR__ . "/DiscountFour.php";

class SotoMenu extends Menu
{
    use DiscountFour;

    protected $price = 20000;

    public static function getName()
    {
        return "Soto";
    }
}
