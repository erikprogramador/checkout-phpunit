<?php

namespace App\Checkout;

class Checkout
{
    protected $items = [];

    protected $taxRate;

    public function fulfill()
    {
        return new FulfilledCheckout($this);
    }

    public function addItem(CheckoutItem $item)
    {
        $this->items[] = $item;
        return $this;
    }

    public function withTax($taxRate)
    {
        $this->taxRate = $taxRate / 100;
        return $this;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getAmmount();
        }
        return $total * ($this->taxRate + 1);
    }
}
