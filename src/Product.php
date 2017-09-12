<?php

class Product
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
}