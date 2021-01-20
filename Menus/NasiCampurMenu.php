<?php

require_once __DIR__ . "/Menu.php";
require_once __DIR__ . "/../Mesin.php";

class NasiCampurMenu extends Menu
{
    protected $price = 20000;

    public function optionalDiscount(Mesin $mesin)
    {
        if ($mesin->hasSoftTopping() && $mesin->hasMediumTopping()) {
            $mesin->addDiscount(2 / 100);
        }
    }

    public static function getName()
    {
        return "Nasi Campur";
    }
}
