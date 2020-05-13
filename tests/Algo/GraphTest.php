<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use DS\Graph\Graph;
use Algo\Graph\BreadthFirst;
use Algo\Graph\DepthFirst;
use Faker;

final class GraphTest extends TestCase
{
    protected $faker;
    protected $graph;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
        $this->graph = new Graph();
    }

    public function testGraphBreadthFirst()
    {
        $this->graph->addEdge('0', '1', $this->faker->randomNumber(2));
        $this->graph->addEdge('0', '2', $this->faker->randomNumber(2));
        $this->graph->addEdge('1', '2', $this->faker->randomNumber(2));
        $this->graph->addEdge('2', '0', $this->faker->randomNumber(2));
        $this->graph->addEdge('2', '3', $this->faker->randomNumber(2));
        $this->graph->addEdge('3', '3', $this->faker->randomNumber(2));
        $traverse = new BreadthFirst();
        $this->assertEquals([2, 0, 1, 3], $traverse->traverse($this->graph, 2));
    }

    public function testGraphDepthFirst()
    {
        $this->graph->addEdge('0', '1', $this->faker->randomNumber(2));
        $this->graph->addEdge('0', '2', $this->faker->randomNumber(2));
        $this->graph->addEdge('1', '3', $this->faker->randomNumber(2));
        $this->graph->addEdge('2', '4', $this->faker->randomNumber(2));
        $this->graph->addEdge('4', '5', $this->faker->randomNumber(2));
        $this->graph->addEdge('4', '6', $this->faker->randomNumber(2));
        $this->graph->addEdge('6', '7', $this->faker->randomNumber(2));
        $traverse = new DepthFirst();
        $this->assertEquals([0, 2, 4, 6, 7, 5, 1, 3], $traverse->traverse($this->graph, 0));
    }
}
