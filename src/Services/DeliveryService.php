<?php

namespace Acme\WidgetCo\Services;

use Acme\WidgetCo\Models\DeliveryChargeRule;

class DeliveryService
{
    /** @var DeliveryChargeRule[] */
    private array $rules;

    /**
     * @param DeliveryChargeRule[] $rules
     */
    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    public function calculateDelivery(float $total): float
    {
        foreach ($this->rules as $rule) {
            if ($total < $rule->getThreshold()) {
                return $rule->getCost();
            }
        }
        return 0.0;
    }
}
