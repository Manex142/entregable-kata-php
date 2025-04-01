<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\Carrito;
use PHPUnit\Framework\TestCase;

class CarritoTest extends TestCase
{
    /**
     * @test
     */
    public function addingAProductReturnsUpdatedList()
    {
        $carrito = new Carrito();

        $result = $carrito->addProduct('añadir pan');

        $this->assertEquals('pan x1', $result);
    }

    /**
     * @test
     */
    public function addingAProductNTimesReturnsUpdatedList()
    {
        $carrito = new Carrito();

        $result = $carrito->addProduct('añadir pan 2');

        $this->assertEquals('pan x2', $result);
    }

    /**
     * @test
     */
    public function addingAnExistantProductReturnsListWithUpdatedAmount()
    {
        $carrito = new Carrito();

        $carrito->addProduct('añadir pan 2');
        $result = $carrito->addProduct('añadir pan 2');

        $this->assertEquals('pan x4', $result);
    }

    /**
     * @test
     */
    public function eliminatingAnExistantProductReturnsUpdatedList()
    {
        $carrito = new Carrito();

        $carrito->addProduct('añadir pan 2');
        $result = $carrito->addProduct('eliminar pan 2');

        $this->assertEquals('', $result);
    }
}
