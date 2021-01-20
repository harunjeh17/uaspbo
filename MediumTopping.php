<?php

require_once __DIR__ . "/Topping.php";

class AyamSuirMediumTopping extends Topping
{
    protected $price = 3000;

    public static function getName()
    {
        return "Ayam Suir";
    }
}

class DagingPotongKecilMediumTopping extends Topping
{
    protected $price = 1000;

    public static function getName()
    {
        return "Daging Potong Kecil";
    }
}
