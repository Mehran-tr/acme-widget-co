<?php

use PHPUnit\Framework\TestCase;
use Acme\WidgetCo\Models\DeliveryChargeRule;

class DeliveryChargeRuleTest extends TestCase
{
    public function testDeliveryChargeRuleCreation()
    {
        $rule = new DeliveryChargeRule(50, 4.95);
        $this->assertEquals(50, $rule->getThreshold());
        $this->assertEquals(4.95, $rule->getCost());
    }
}
