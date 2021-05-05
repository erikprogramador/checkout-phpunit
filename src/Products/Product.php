<?php

namespace App\Products;

use App\Checkout\CheckoutItem;

class Product implements CheckoutItem
{
    protected $name;

    protected $ammount;

    public function __construct($name, $ammount)
    {
        $this->name = $name;
        $this->ammount = $ammount;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setAmmount($ammount)
    {
        $this->ammount = $ammount;

        return $this;
    }

    public function getAmmount()
    {
        return $this->ammount;
    }
}
