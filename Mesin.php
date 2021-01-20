<?php

class Mesin
{
    private $menu;
    private $softToppings = [];
    private $mediumToppings = [];
    private $discounts = [];

    public function setMenu($menu)
    {
        $this->menu = new $menu;
    }

    public function getMenu()
    {
        return $this->menu;
    }

    public function addSoftTopping($softTopping)
    {
        [$class, $amount] = $softTopping;
        $this->softToppings[] = new $class($amount);
    }

    public function addMediumTopping($mediumTopping)
    {
        [$class, $amount] = $mediumTopping;
        $this->mediumToppings[] = new $class($amount);
    }

    public function calculate()
    {
        $this->calculateSoftTopings();
        $this->calculateMediumTopings();
        $this->calculateOptionalDiscount();
    }

    private function calculateSoftTopings()
    {
        foreach ($this->softToppings as $softTopping) {
            $softTopping->calculate();
        }
    }

    private function calculateMediumTopings()
    {
        foreach ($this->mediumToppings as $mediumTopping) {
            $mediumTopping->calculate();
        }
    }

    private function calculateOptionalDiscount()
    {
        $this->menu->optionalDiscount($this);
    }

    public function getSoftTopingsCost()
    {
        $cost = 0;

        foreach ($this->softToppings as $softTopping) {
            $cost += $softTopping->getCost();
        }

        return $cost;
    }

    public function getMediumTopingsCost()
    {
        $cost = 0;

        foreach ($this->mediumToppings as $mediumTopping) {
            $cost += $mediumTopping->getCost();
        }

        return $cost;
    }

    public function getTotalCost()
    {
        $finalCost = 0;
        $finalCost += $this->menu->getPrice();
        $finalCost += $this->getSoftTopingsCost();
        $finalCost += $this->getMediumTopingsCost();

        $finalCost = $this->calculateDiscount($finalCost);

        return $finalCost;
    }

    private function calculateDiscount($cost)
    {
        foreach ($this->discounts as $discount) {
            $cost -= ($cost + $discount) - $cost;
        }

        return $cost;
    }

    public function getAmountOfSoftToppings()
    {
        $amount = 0;

        foreach ($this->softToppings as $softTopping) {
            $amount += $softTopping->getAmount();
        }

        return $amount;
    }

    public function getAmountOfMediumToppings()
    {
        $amount = 0;

        foreach ($this->mediumToppings as $mediumTopping) {
            $amount += $mediumTopping->getAmount();
        }

        return $amount;
    }

    public function hasSoftTopping()
    {
        return count($this->softToppings) > 0;
    }

    public function hasMediumTopping()
    {
        return count($this->mediumToppings) > 0;
    }

    public function addDiscount($discount)
    {
        $this->discounts[] = $discount;
    }
}
