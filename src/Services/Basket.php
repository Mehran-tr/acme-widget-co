<?php

namespace Acme\WidgetCo\Services;

use Acme\WidgetCo\Models\Product;

class Basket
{
    /** @var Product[] */
    private array $products = [];

    public function __construct(
        private DeliveryService $deliveryService,
        private OfferService $offerService
    ) {}

    public function add(Product $product): void
    {
        $this->products[] = $product;
    }

    public function total(): float
    {
        $total = array_reduce($this->products, fn($sum, $product) => $sum + $product->getPrice(), 0.0);
        $total = $this->offerService->applyOffers($this->products, $total);
        $total += $this->deliveryService->calculateDelivery($total);
        return $total;
    }
}
