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

    public function getStock($productService)
    {
        $stockCheck = $productService->returnStock();

        if ($stockCheck === 1)
        {
            return 'Only one left in stock!';
        }

        if ($stockCheck < 5 && $stockCheck > 1)
        {
            return 'Warning low stock!';
        }

        if ($stockCheck > 5)
        {
            return 'In Stock';
        }





    }
}