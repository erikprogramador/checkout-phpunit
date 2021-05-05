<?php

namespace App\Products;

use App\Checkout\CheckoutItem;

class Product implements CheckoutItem
{
    protected $name;

    protected $ammount;

    public function __construct(string $name, float $ammount)
    {
        $this->name = $name;
        $this->ammount = $ammount;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setAmmount(float $ammount): self
    {
        $this->ammount = $ammount;

        return $this;
    }

    public function getAmmount(): float
    {
        return $this->ammount;
    }
}
