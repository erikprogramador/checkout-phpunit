<?php

namespace App\Checkout;

class Checkout
{
    protected array $items = [];

    protected float $taxRate = 0;

    public function fulfill(): FulfilledCheckout
    {
        return new FulfilledCheckout($this);
    }

    public function addItem(CheckoutItem $item): self
    {
        $this->items[] = $item;
        return $this;
    }

    public function withTax(float $taxRate): self
    {
        $this->taxRate = $taxRate / 100;
        return $this;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getAmmount();
        }
        return $total * ($this->taxRate + 1);
    }
}
