<?php

use PHPUnit\Framework\TestCase;
use Acme\WidgetCo\Models\DeliveryChargeRule;
use Acme\WidgetCo\Services\DeliveryService;

class DeliveryServiceTest extends TestCase
{
    public function testCalculateDelivery()
    {
        $rules = [
            new DeliveryChargeRule(50, 4.95),
            new DeliveryChargeRule(90, 2.95),
            new DeliveryChargeRule(PHP_INT_MAX, 0.0) // Large number for simplicity
        ];
        $service = new DeliveryService($rules);

        $this->assertEquals(4.95, $service->calculateDelivery(49.99));
        $this->assertEquals(2.95, $service->calculateDelivery(70));
        $this->assertEquals(0.0, $service->calculateDelivery(90));
    }
}
