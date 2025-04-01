<?php

namespace Deg540\DockerPHPBoilerplate;

class Carrito
{

    private array $productList = [];

    public function addProduct(string $newOrder): string
    {
        $newOrder = explode(' ', $newOrder);
        $order = $newOrder[0];
        if ($order === 'añadir') {
            $productName = $newOrder[1];
            $quantity = $this->getQuantity($newOrder);
            $newProduct = $productName . ' x' . $quantity;
            $productsInList = $this->getProductsInList();
            if( in_array($productName, $productsInList) ) {
                $key = array_search($productName, $this->productList);
                $quantity = (int)explode(' ', $this->productList[$key])[1][1] + $quantity;
                $newProduct = explode(' ', $this->productList[$key])[0] . ' x' . $quantity;
                unset($this->productList[$key]);
            }
            $this->productList[] = $newProduct;
        }
        if ($order === 'eliminar') {
            $productName = $newOrder[1];
            $quantity = $this->getQuantity($newOrder);
            $newProduct = $productName . ' x' . $quantity;
            $productsInList = $this->getProductsInList();
            if( !in_array($productName, $productsInList) ) {
                return 'El producto seleccionado no existe';
            }
            $key = array_search($productName, $this->productList);
            $quantity = (int)explode(' ', $this->productList[$key])[1][1] - $quantity;
            if ($quantity > 0) {
                $newProduct = explode(' ', $this->productList[$key])[0] . ' x' . $quantity;
                unset($this->productList[$key]);
                $this->productList[] = $newProduct;
            } else {
                unset($this->productList[$key]);
            }
        }
        if ($order === 'vaciar') {
            $this->productList = [];
        }
        return implode(', ', $this->productList);
    }

    private function getProductsInList(): array
    {
        $productsInList = [];
        for ($i = 0; $i < count($this->productList); $i++) {
            $productsInList[] = explode(' ', $this->productList[$i])[0];
        }
        return $productsInList;
    }

    private function getQuantity(array $newOrder): int
    {
        if (count($newOrder) === 3) {
            $quantity = (int)$newOrder[2];
        } else {
            $quantity = 1;
        }
        return $quantity;
    }
}
