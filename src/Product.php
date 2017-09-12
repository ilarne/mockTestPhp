<?php

class Product
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function totalPrice()
    {
        return $this->productService->getPrice() * 1.2;
    }

    public function showDescription()
    {
        if ($this->productService->getDescription()) {
            return $this->productService->getDescription();
        }
        else {
            return $this->productService->getName();
        }
    }

    public function getStock($productId)
    {
        if ($this->productService->returnStock() > 5)
            return 'In Stock';
    }
}