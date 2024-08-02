<?php

namespace Acme\WidgetCo\Models;

interface SpecialOffer
{
    /**
     * @param Product[] $products
     */
    public function apply(array $products, float $total): float;
}
