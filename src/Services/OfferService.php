<?php

namespace Acme\WidgetCo\Services;

use Acme\WidgetCo\Models\Product;
use Acme\WidgetCo\Models\SpecialOffer;

class OfferService
{
    /** @var SpecialOffer[] */
    private array $offers;

    /**
     * @param SpecialOffer[] $offers
     */
    public function __construct(array $offers)
    {
        $this->offers = $offers;
    }

    /**
     * @param Product[] $products
     */
    public function applyOffers(array $products, float $total): float
    {
        foreach ($this->offers as $offer) {
            $total = $offer->apply($products, $total);
        }
        return $total;
    }
}
