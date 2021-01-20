<?php 
class SotoMenu extends Menu
{
    use DiscountFour;

    protected $price = 20000;

    public static function getName()
    {
        return "Soto";
    }
}


