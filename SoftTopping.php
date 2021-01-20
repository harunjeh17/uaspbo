<?php

require_once __DIR__ . "/Topping.php";

class KrupukSoftTopping extends Topping
{
    protected $price = 500;

    public static function getName()
    {
        return "Krupuk";
    }
}

class SeladaSoftTopping extends Topping
{
    protected $price = 50;

    public static function getName()
    {
        return "Selada";
    }
}

class GaramSoftTopping extends Topping
{
    protected $price = 3;

    public static function getName()
    {
        return "Garam";
    }
}

class GulaSoftTopping extends Topping
{
    protected $price = 1;

    public static function getName()
    {
        return "Gula";
    }
}
