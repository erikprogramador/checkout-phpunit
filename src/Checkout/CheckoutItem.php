<?php

namespace App\Checkout;

interface CheckoutItem
{
    public function __construct(string $name, float $ammount);

    public function setName(string $name): self;

    public function getName(): string;

    public function setAmmount(float $ammount): self;

    public function getAmmount(): float;
}
