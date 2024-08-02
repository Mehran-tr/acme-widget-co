<?php

use PHPUnit\Framework\TestCase;
use Acme\WidgetCo\Models\Product;
use Acme\WidgetCo\Models\SpecialOffer;

class SpecialOfferTest extends TestCase
{
    // Example test for a hypothetical special offer
    public function testSpecialOfferApplication()
    {
        $offer = $this->createMock(SpecialOffer::class);
        $products = [new Product('R01', 'Red Widget', 32.95)];
        $offer->method('apply')->willReturn(30.0);

        $this->assertEquals(30.0, $offer->apply($products, 32.95));
    }
}
