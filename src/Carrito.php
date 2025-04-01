<?php

namespace Deg540\DockerPHPBoilerplate;

class Carrito
{

    private array $productList = [];

    public function addProduct(string $newOrder): string
    {
        $newOrder = explode(' ', $newOrder);
        $productName = $newOrder[1];
        if (count($newOrder) === 3) {
            $quantity = (int)$newOrder[2];
        }else {
            $quantity = 1;
        }
        $newProduct = $productName . ' x' . $quantity;
        $productsInList = [];
        for ($i = 0; $i < count($this->productList); $i++) {
            $productsInList[] = explode(' ', $this->productList[$i])[0];
        }
        if( in_array($productName, $productsInList) ) {
            $key = array_search($productName, $this->productList);
            $quantity = (int)explode(' ', $this->productList[$key])[1][1] + $quantity;
            $newProduct = explode(' ', $this->productList[$key])[0] . ' x' . $quantity;
            unset($this->productList[$key]);
        }
        $this->productList[] = $newProduct;

        return implode(', ', $this->productList);
    }
}
