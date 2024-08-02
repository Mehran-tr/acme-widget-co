<?php

namespace Acme\WidgetCo\Services;

use Acme\WidgetCo\Models\Product;

class ProductService
{
    /** @var Product[] */
    private array $products;

    /**
     * @param Product[] $products
     */
    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function getProductByCode(string $code): ?Product
    {
        foreach ($this->products as $product) {
            if ($product->getCode() === $code) {
                return $product;
            }
        }
        return null;
    }

    /**
     * @return Product[]
     */
    public function getAllProducts(): array
    {
        return $this->products;
    }
}
