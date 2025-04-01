<?php

namespace Deg540\DockerPHPBoilerplate;

class Carrito
{
    public function addProduct(string $product): string
    {
        $array = explode(' ', $product);
        $productName = $array[1];
        if (count($array) === 3) {
            $quantity = (int)$array[2];
            return $productName . ' x' . $quantity;
        }

        return $productName . ' x1';
    }
}
