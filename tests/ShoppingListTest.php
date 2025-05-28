<?php
declare(strict_types=1);

namespace Deg540\CleanCodeKata9\Test;

use PHPUnit\Framework\TestCase;

final class ShoppingListTest extends TestCase
{
    private ShoppingList $shoppingList;

    protected function setUp(): void
    {
        $this->shoppingList = new ShoppingList();
    }

    /**
     * @test
     */
    public function testShoppingListAdd(): void
    {
        $actual = $this->shoppingList->manageShoppingList("add");

        $this->assert
    }

    /**
     * @test
     */
    public function testShoppingListRemove(): void
    {

    }

    /**
     * @test
     */
    public function testShoppingListRemoveAll(): void
    {
    }

    /**
     * @test
     */
    public function testInvalidArgument(): void
    {

    }
}