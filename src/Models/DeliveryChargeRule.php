<?php

namespace Acme\WidgetCo\Models;

class DeliveryChargeRule
{
    public function __construct(
        private float $threshold,
        private float $cost
    ) {}

    public function getThreshold(): float
    {
        return $this->threshold;
    }

    public function getCost(): float
    {
        return $this->cost;
    }
}
