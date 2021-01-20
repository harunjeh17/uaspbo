<?php

require_once __DIR__ . "/../Mesin.php";

trait DiscountFour
{
    public function optionalDiscount(Mesin $mesin)
    {
        if ($mesin->hasSoftTopping() && $mesin->hasMediumTopping()) {
            if ($mesin->getAmountOfSoftToppings() === 3 && $mesin->getAmountOfMediumToppings() === 4) {
                $mesin->addDiscount(3 / 100);
            }
        }
    }
}
