<?php

use Acme\WidgetCo\Services\ProductService;
use PHPUnit\Framework\TestCase;
use Acme\WidgetCo\Models\Product;

class ProductServiceTest extends TestCase
{
    private ProductService $productService;

    protected function setUp(): void
    {
        $this->productService = new ProductService([
            new Product('R01', 'Red Widget', 32.95),
            new Product('G01', 'Green Widget', 24.95),
            new Product('B01', 'Blue Widget', 7.95),
        ]);
    }

    public function testGetProductByCode()
    {
        $product = $this->productService->getProductByCode('R01');
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals('R01', $product->getCode());
        $this->assertEquals(32.95, $product->getPrice());
    }

    public function testGetProductByCodeNotFound()
    {
        $product = $this->productService->getProductByCode('X01');
        $this->assertNull($product);
    }

    public function testGetAllProducts()
    {
        $products = $this->productService->getAllProducts();
        $this->assertCount(3, $products);
        $this->assertContainsOnlyInstancesOf(Product::class, $products);
    }
}
