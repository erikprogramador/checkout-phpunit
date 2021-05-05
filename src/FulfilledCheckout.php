<?php

namespace App;

class FulfilledCheckout
{
    protected $code;

    protected $checkout;

    public function __construct(Checkout $checkout)
    {
        $this->checkout = $checkout;
        $this->code = $this->generateCode();
    }

    public function getItems()
    {
        return $this->checkout->getItems();
    }

    public function getTotal()
    {
        return $this->checkout->getTotal();
    }

    public function getCode()
    {
        return $this->code;
    }

    protected function generateCode()
    {
        return md5(date('ymd'));
    }
}
