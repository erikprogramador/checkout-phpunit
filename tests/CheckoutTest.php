<?php

namespace Tests;

use App\Item;
use App\Checkout;
use PHPUnit\Framework\TestCase;

class CheckoutTest extends TestCase
{
    /** @test */
    public function it_can_add_itens_to_cart()
    {
        $item1 = new Item('Product 1', 22.5);
        $item2 = new Item('Product 2', 34.5);
        $checkout = new Checkout();
        $checkout->addItem($item1);
        $checkout->addItem($item2);

        $this->assertCount(2, $checkout->getItems());
    }

    /** @test */
    public function it_can_calculate_the_total_price()
    {
        $item1 = new Item('Product 1', 22.5);
        $item2 = new Item('Product 2', 34.5);
        $checkout = new Checkout();
        $checkout->addItem($item1);
        $checkout->addItem($item2);

        $this->assertEquals(57, $checkout->getTotal());
    }

    /** @test */
    public function it_can_calculate_the_total_price_with_taxes()
    {
        $item1 = new Item('Product 1', 22.5);
        $item2 = new Item('Product 2', 34.5);
        $checkout = new Checkout();
        $checkout->withTax(30);
        $checkout->addItem($item1);
        $checkout->addItem($item2);

        $this->assertEquals(74.10, $checkout->getTotal());
    }
}
