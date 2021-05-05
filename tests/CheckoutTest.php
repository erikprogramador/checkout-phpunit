<?php

namespace Tests;

use App\Products\Product;
use App\Checkout\Checkout;
use PHPUnit\Framework\TestCase;
use App\Checkout\FulfilledCheckout;

class CheckoutTest extends TestCase
{
    /** @test */
    public function it_can_add_items_to_cart()
    {
        $item1 = new Product('Product 1', 22.5);
        $item2 = new Product('Product 2', 34.5);
        $checkout = new Checkout();
        $checkout->addItem($item1);
        $checkout->addItem($item2);

        $this->assertCount(2, $checkout->getItems());
    }

    /** @test */
    public function it_can_calculate_the_total_price()
    {
        $item1 = new Product('Product 1', 22.5);
        $item2 = new Product('Product 2', 34.5);
        $checkout = new Checkout();
        $checkout->addItem($item1);
        $checkout->addItem($item2);

        $this->assertEquals(57, $checkout->getTotal());
    }

    /** @test */
    public function it_can_calculate_the_total_price_with_taxes()
    {
        $item1 = new Product('Product 1', 22.5);
        $item2 = new Product('Product 2', 34.5);
        $checkout = new Checkout();
        $checkout->withTax(30);
        $checkout->addItem($item1);
        $checkout->addItem($item2);

        $this->assertEquals(74.10, $checkout->getTotal());
    }

    /** @test */
    public function it_can_be_fulfilled()
    {
        $item1 = new Product('Product 1', 22.5);
        $item2 = new Product('Product 2', 34.5);
        $checkout = new Checkout();
        $checkout->withTax(30);
        $checkout->addItem($item1);
        $checkout->addItem($item2);

        $fulfilledCheckout = $checkout->fulfill();
        $this->assertInstanceOf(FulfilledCheckout::class, $fulfilledCheckout);
    }

    /** @test */
    public function it_returned_fufilled_may_contains_the_items()
    {
        $item1 = new Product('Product 1', 22.5);
        $item2 = new Product('Product 2', 34.5);
        $checkout = new Checkout();
        $checkout->withTax(30);
        $checkout->addItem($item1);
        $checkout->addItem($item2);

        $fulfilledCheckout = $checkout->fulfill();
        $this->assertEquals($item1->getName(), $fulfilledCheckout->getItems()[0]->getName());
        $this->assertEquals($item2->getName(), $fulfilledCheckout->getItems()[1]->getName());
    }

    /** @test */
    public function it_returned_fufilled_may_contains_the_total()
    {
        $item1 = new Product('Product 1', 22.5);
        $item2 = new Product('Product 2', 34.5);
        $checkout = new Checkout();
        $checkout->withTax(30);
        $checkout->addItem($item1);
        $checkout->addItem($item2);

        $fulfilledCheckout = $checkout->fulfill();
        $this->assertEquals(74.10, $fulfilledCheckout->getTotal());
    }

    /** @test */
    public function it_returned_fufilled_may_contains_a_unique_code()
    {
        $item1 = new Product('Product 1', 22.5);
        $item2 = new Product('Product 2', 34.5);
        $checkout = new Checkout();
        $checkout->withTax(30);
        $checkout->addItem($item1);
        $checkout->addItem($item2);

        $fulfilledCheckout = $checkout->fulfill();
        $this->assertNotNull($fulfilledCheckout->getCode());
    }
}
