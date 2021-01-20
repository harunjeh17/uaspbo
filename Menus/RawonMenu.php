<?php

require_once __DIR__ . "/Menu.php";
require_once __DIR__ . "/DiscountFour.php";

class RawonMenu extends Menu
{
    use DiscountFour;

    protected $price = 13000;

    public static function getName()
    {
        return "Rawon";
    }
}