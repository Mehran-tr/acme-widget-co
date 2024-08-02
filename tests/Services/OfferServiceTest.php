<?php

use Acme\WidgetCo\Models\SpecialOffer;
use Acme\WidgetCo\Services\OfferService;
use PHPUnit\Framework\TestCase;
use Acme\WidgetCo\Models\Product;

class OfferServiceTest extends TestCase
{
    public function testApplyOffers()
    {
        $offer = $this->createMock(SpecialOffer::class);
        $offer->method('apply')->willReturn(30.0);

        $service = new OfferService([$offer]);
        $products = [new Product('R01', 'Red Widget', 32.95)];
        $total = 32.95;

        $this->assertEquals(30.0, $service->applyOffers($products, $total));
    }
}
