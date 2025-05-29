<?php

namespace Deg540\DockerPHPBoilerplate;

class ShoppingList
{
    private array $shoppingList = [];
    
    public function manageShoppingList(string $action): string
    {
        $separatedAction = explode(" ", $action);

        switch ($separatedAction[0]) {
            case "añadir":
                return $this->manageAddProduct($separatedAction);

            case "eliminar":
                return $this->manageDeleteProduct($separatedAction);

            case "vaciar":
                return $this->manageEmptyList();

            default:
                return "Acción no válida";
        }
    }

    private function manageAddProduct(array $separatedAction): string
    {
        if ($this->existsProductInList($separatedAction[1])) {
            return $this->manageProductQuantity($separatedAction);
        }
        $this->addProductToList($separatedAction[1]);
        return $this->manageProductQuantity($separatedAction);
    }

    private function manageDeleteProduct(array $separatedAction): string
    {
        if ($this->existsProductInList($separatedAction[1])) {
            $this->processDeleteProduct($separatedAction[1]);
            return $this->outputList();
        }
        return "El producto seleccionado no existe";
    }

    private function manageEmptyList(): string
    {
        unset($this->shoppingList);
        return "";
    }

    public function manageProductQuantity(array $separatedAction): string
    {
        if (!$this->existsQuantity($separatedAction)) {

            $quantity = $this->getsQuantity($separatedAction[2]);
            $this->updateProductQuantitySpecified($separatedAction[1], $quantity);

        } else {
            $this->updateProductQuantityNotSpecified($separatedAction[1]);
        }
        return $this->outputList();
    }

    private function processDeleteProduct(string $product): void
    {
        unset($this->shoppingList[$product]);
    }

    private function existsProductInList(string $product): bool
    {
        return isset($this->shoppingList[$product]);
    }

    private function addProductToList(string $product): void
    {
        $this->shoppingList += array($product => 0);
    }

    private function existsQuantity(array $quantity): bool
    {
        return count($quantity) == 2;
    }

    private function getsQuantity(string $rawQuantity): int
    {
        return substr($rawQuantity, 1);
    }

    private function updateProductQuantityNotSpecified(string $product): void
    {
        $this->shoppingList[$product]+=1;
    }

    private function updateProductQuantitySpecified(string $product, int $quantity): void
    {
        $this->shoppingList[$product] += $quantity;
    }

    public function outputList(): string
    {
        $list = "";
        foreach ($this->shoppingList as $product => $quantity) {
            $list .= $product . " => " . $quantity . ', ';
        }
        return $list;
    }
}