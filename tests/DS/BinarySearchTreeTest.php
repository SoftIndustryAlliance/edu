<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use DS\BinarySearchTree\Node;
use Faker;

final class BinarySearchTreeTest extends TestCase
{
    protected $faker;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
    }

    public function testNodeInsert()
    {
        $bst = new Node(50, $this->faker->word);
        $this->assertInstanceOf(Node::class, $bst->insert(30, $this->faker->word));
    }

    public function testNodeFind()
    {
        $bst = new Node(50, $this->faker->word);
        $bst->insert(30, $this->faker->word);
        $bst->insert(20, $this->faker->word);
        $bst->insert(40, 'test');
        $bst->insert(70, $this->faker->word);
        $bst->insert(60, $this->faker->word);
        $bst->insert(80, $this->faker->word);
        $this->assertEquals('test', $bst->find(40));
        $this->assertNull($bst->find(45));
    }

    public function testNodeRemoveHead()
    {
        $bst = new Node(50, $this->faker->word);
        $bst->insert(30, $this->faker->word);
        $bst->insert(20, $this->faker->word);
        $bst->insert(40, $this->faker->word);
        $bst->insert(70, $this->faker->word);
        $bst->insert(60, $this->faker->word);
        $bst->insert(80, $this->faker->word);
        $this->assertTrue($bst->remove(50));
        $this->assertNull($bst->find(50));
        $this->assertFalse($bst->remove(55));
    }

    public function testNodeRemoveLastNode()
    {
        $bst = new Node(50, $this->faker->word);
        $this->assertTrue($bst->remove(50));
        $this->assertNull($bst->find(50));
    }

    public function testNodeRemoveHeadWithOneSubTree()
    {
        $bst = new Node(50, $this->faker->word);
        $bst->insert(30, $this->faker->word);
        $bst->insert(20, $this->faker->word);
        $bst->insert(40, $this->faker->word);
        $this->assertTrue($bst->remove(50));
        $this->assertNull($bst->find(50));
    }

    public function testNodeRemoveSubTreeHead()
    {
        $bst = new Node(50, $this->faker->word);
        $bst->insert(30, $this->faker->word);
        $bst->insert(20, $this->faker->word);
        $bst->insert(40, $this->faker->word);
        $bst->insert(70, $this->faker->word);
        $bst->insert(60, $this->faker->word);
        $bst->insert(80, $this->faker->word);
        $this->assertTrue($bst->remove(30));
        $this->assertNull($bst->find(30));
    }

    public function testNodeRemoveLeaf()
    {
        $bst = new Node(50, $this->faker->word);
        $bst->insert(30, $this->faker->word);
        $bst->insert(20, $this->faker->word);
        $bst->insert(40, $this->faker->word);
        $bst->insert(70, $this->faker->word);
        $bst->insert(60, $this->faker->word);
        $bst->insert(80, $this->faker->word);
        $this->assertTrue($bst->remove(40));
        $this->assertNull($bst->find(40));
    }

    public function testBreadthFirstSearch()
    {
        $bst = new Node(50, $this->faker->word);
        $bst->insert(30, $this->faker->word);
        $bst->insert(20, $this->faker->word);
        $bst->insert(40, 'test');
        $bst->insert(70, $this->faker->word);
        $bst->insert(60, $this->faker->word);
        $bst->insert(80, $this->faker->word);
        $this->assertEquals('test', $bst->breadthFirstSearch(40));
    }
}
