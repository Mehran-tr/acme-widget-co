<?php

use PHPUnit\Framework\TestCase;
use Acme\WidgetCo\Models\Product;
use Acme\WidgetCo\Services\Basket;
use Acme\WidgetCo\Services\DeliveryService;
use Acme\WidgetCo\Services\OfferService;
use Acme\WidgetCo\Models\DeliveryChargeRule;
use Acme\WidgetCo\Models\SpecialOffers\HalfPriceSecondRedWidgetOffer;

class BasketTest extends TestCase
{
    private Basket $basket;

    protected function setUp(): void
    {
        $deliveryRules = [
            new DeliveryChargeRule(50, 4.95),
            new DeliveryChargeRule(90, 2.95),
            new DeliveryChargeRule(PHP_INT_MAX, 0.0) // Simplified free delivery for orders >= 90
        ];

        $deliveryService = new DeliveryService($deliveryRules);
        $offerService = new OfferService([new HalfPriceSecondRedWidgetOffer()]);

        $this->basket = new Basket($deliveryService, $offerService);
    }

    public function testBasketTotalB01G01()
    {
        $productB01 = new Product('B01', 'Blue Widget', 7.95);
        $productG01 = new Product('G01', 'Green Widget', 24.95);

        $this->basket->add($productB01);
        $this->basket->add($productG01);

        $total = $this->basket->total();
        echo "Test: B01, G01 | Expected: 37.85 | Actual: {$total}\n";
        $this->assertEqualsWithDelta(37.85, $total, 0.01, 'Total for B01, G01');
    }

    public function testBasketTotalR01R01()
    {
        $productR01 = new Product('R01', 'Red Widget', 32.95);

        $this->basket->add($productR01);
        $this->basket->add($productR01);

        $total = $this->basket->total();
        echo "Test: R01, R01 | Expected: 54.37 | Actual: {$total}\n";
        $this->assertEqualsWithDelta(54.37, $total, 0.01, 'Total for R01, R01');
    }

    public function testBasketTotalR01G01()
    {
        $productR01 = new Product('R01', 'Red Widget', 32.95);
        $productG01 = new Product('G01', 'Green Widget', 24.95);

        $this->basket->add($productR01);
        $this->basket->add($productG01);

        $total = $this->basket->total();
        echo "Test: R01, G01 | Expected: 60.85 | Actual: {$total}\n";
        $this->assertEqualsWithDelta(60.85, $total, 0.01, 'Total for R01, G01');
    }

    public function testBasketTotalB01B01R01R01R01()
    {
        $productB01 = new Product('B01', 'Blue Widget', 7.95);
        $productR01 = new Product('R01', 'Red Widget', 32.95);

        $this->basket->add($productB01);
        $this->basket->add($productB01);
        $this->basket->add($productR01);
        $this->basket->add($productR01);
        $this->basket->add($productR01);

        $total = $this->basket->total();
        echo "Test: B01, B01, R01, R01, R01 | Expected: 98.27 | Actual: {$total}\n";
        $this->assertEqualsWithDelta(98.27, $total, 0.01, 'Total for B01, B01, R01, R01, R01');
    }
}
