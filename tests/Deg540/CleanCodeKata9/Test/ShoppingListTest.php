<?php

namespace Deg540\CleanCodeKata9\Test;

use Deg540\DockerPHPBoilerplate\ShoppingList;
use PHPUnit\Framework\TestCase;

final class ShoppingListTest extends TestCase
{
    private ShoppingList $shoppingList;

    /**
     * @setUp
     */
    protected function setUp(): void
    {
        $this->shoppingList = new ShoppingList();
    }

    /**
     * @test
     */
    public function testShoppingListAddOneValueWithoutQuantity(): void
    {
        $actual = $this->shoppingList->manageShoppingList("añadir pan");

        $this->assertEquals("pan => 1, ", $actual);
    }

    /**
     * @test
     */
    public function testShoppingListAddOneValueWithQuantity() : void
    {
        $actual = $this->shoppingList->manageShoppingList("añadir pan x3");

        $this->assertEquals("pan => 3, ", $actual);
    }

    /**
     * @test
     */
    public function testShoppingListAddMoreQuantityToProduct(): void
    {
        $this->shoppingList->manageShoppingList("añadir pan");

        $this->assertEquals("pan => 3, ", $this->shoppingList->manageShoppingList("añadir pan x2"));
    }

    /**
     * @test
     */
    public function testShoppingListRemove(): void
    {
        $this->shoppingList->manageShoppingList("añadir pan");
        $this->shoppingList->manageShoppingList("añadir leche");

        $actual = $this->shoppingList->manageShoppingList("eliminar pan");

        $this->assertEquals("leche => 1, ", $actual);
    }

    /**
     * @test
     */
    public function testShoppingListRemoveProductNotFound(): void
    {
        $this->shoppingList->manageShoppingList("añadir pan");
        $this->shoppingList->manageShoppingList("añadir leche");

        $actual = $this->shoppingList->manageShoppingList("eliminar arroz");

        $this->assertEquals("El producto seleccionado no existe", $actual);
    }

    /**
     * @test
     */
    public function testShoppingListRemoveAll(): void
    {
        $this->shoppingList->manageShoppingList("añadir pan");
        $this->shoppingList->manageShoppingList("añadir leche");

        $this->assertEquals("", $this->shoppingList->manageShoppingList("vaciar"));
    }

    /**
     * @test
     */
    public function testsInvalidArgument(): void
    {
        $actual = $this->shoppingList->manageShoppingList("");

        $this->assertEquals("Acción no válida", $actual);
    }
}