<?php
use PHPUnit\Framework\TestCase;

require (__DIR__ . '/../src/Product.php');

class ProductTest extends TestCase
{
    public function testTotalPrice()
    {
       $priceMock = $this->getMockBuilder('ProductService')
            ->setMethods(array('getPrice'))->getMock();

       $priceMock->method('getPrice')
           ->willReturn(10);

        $product = new Product($priceMock);

        $this->assertEquals(12, $product->totalPrice());
    }

    public function testProductDescriptionReturned()
    {
        $descriptionMock = $this->getMockBuilder('ProductService')
            ->setMethods(array('getDescription'))->getMock();

        $descriptionMock->method('getDescription')
            ->willReturn('expensive');

        $product = new Product($descriptionMock);

        $this->assertEquals('expensive', $product->showDescription());
    }

    public function testNoProductDescriptionReturned()
    {
        $descriptionMock = $this->getMockBuilder('ProductService')
            ->setMethods(array('getDescription', 'getName'))->getMock();

        $descriptionMock->method('getDescription')
            ->willReturn(null);

        $descriptionMock->method('getName')
            ->willReturn('iPhone');

        $product = new Product($descriptionMock);

        $this->assertEquals('iPhone', $product->showDescription());
    }

    public function testReturnsInStock()
    {
        $productIdMock = $this->getMockBuilder('ProductService')
            ->setMethods(array('returnStock'))->getMock();

        $productIdMock->method('returnStock')
            ->willReturn(6);

        $product = new Product($productIdMock);

        $this->assertEquals('In Stock', $product->getStock($productIdMock));
    }

    public function testReturnsLowStock()
    {
        
    }
}