<?php

namespace App\Checkout;

class FulfilledCheckout
{
    protected string $code;

    protected Checkout $checkout;

    public function __construct(Checkout $checkout)
    {
        $this->checkout = $checkout;
        $this->code = $this->generateCode();
    }

    public function getItems(): array
    {
        return $this->checkout->getItems();
    }

    public function getTotal(): float
    {
        return $this->checkout->getTotal();
    }

    public function getCode(): string
    {
        return $this->code;
    }

    protected function generateCode(): string
    {
        return md5(date('ymd'));
    }
}
