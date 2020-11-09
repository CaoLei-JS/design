<?php

namespace Tests\Feature;

use App\DesignPatterns\Creational\AbstractFactory\DigitalProduct;
use App\DesignPatterns\Creational\AbstractFactory\ProductFactory;
use App\DesignPatterns\Creational\AbstractFactory\ShippableProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AbstractFactoryTest extends TestCase
{
    public function testCanCreateDigitalProduct()
    {
        $factory = new ProductFactory();
        $product = $factory->createDigitalProduct(150);
        $this->assertInstanceOf(DigitalProduct::class, $product);
    }
    public function testCanCreateShippableProduct()
    {
        $factory = new ProductFactory();
        $product = $factory->createShippableProduct(150);
        $this->assertInstanceOf(ShippableProduct::class, $product);
    }
    public function testCanCalculatePriceForDigitalProduct()
    {
        $factory = new ProductFactory();
        $product = $factory->createDigitalProduct(150);
        $this->assertEquals(150, $product->calculatePrice());
    }
    public function testCanCalculatePriceForShippableProduct()
    {
        $factory = new ProductFactory();
        $product = $factory->createShippableProduct(150);
        $this->assertEquals(200, $product->calculatePrice());
    }
}
