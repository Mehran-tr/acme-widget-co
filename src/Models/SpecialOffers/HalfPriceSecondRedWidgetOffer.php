<?php

namespace Acme\WidgetCo\Models\SpecialOffers;

use Acme\WidgetCo\Models\Product;
use Acme\WidgetCo\Models\SpecialOffer;

class HalfPriceSecondRedWidgetOffer implements SpecialOffer
{
    public function apply(array $products, float $total): float
    {
        $redWidgetCount = 0;

        foreach ($products as $product) {
            if ($product->getCode() === 'R01') {
                $redWidgetCount++;
            }
        }

        $halfPriceRedWidgets = intdiv($redWidgetCount, 2);
        $total -= $halfPriceRedWidgets * 16.475; // Half price of Red Widget

        return $total;
    }
}
