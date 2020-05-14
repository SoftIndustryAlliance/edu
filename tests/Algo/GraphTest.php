<?php

namespace Tests\Algo;

use PHPUnit\Framework\TestCase;
use DS\Graph\Graph;
use DS\Graph\DirectedGraph;
use Algo\Graph\BreadthFirst;
use Algo\Graph\DepthFirst;
use Algo\Graph\Topological;
use Faker;
use \LogicException;

final class GraphTest extends TestCase
{
    protected $faker;
    protected $graph;
    protected $directedGraph;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
        $this->graph = new Graph();
        $this->directedGraph = new DirectedGraph();
    }

    public function testGraphBreadthFirst()
    {
        $this->graph->addEdge('0', '1', $this->faker->randomNumber(2));
        $this->graph->addEdge('0', '2', $this->faker->randomNumber(2));
        $this->graph->addEdge('1', '3', $this->faker->randomNumber(2));
        $this->graph->addEdge('2', '3', $this->faker->randomNumber(2));
        $this->graph->addEdge('3', '4', $this->faker->randomNumber(2));
        $traverse = new BreadthFirst();
        $this->assertEquals([0, 1, 2, 3, 4], $traverse->traverse($this->graph, 0));
    }

    public function testGraphDepthFirst()
    {
        $this->graph->addEdge('0', '1', $this->faker->randomNumber(2));
        $this->graph->addEdge('0', '2', $this->faker->randomNumber(2));
        $this->graph->addEdge('1', '3', $this->faker->randomNumber(2));
        $this->graph->addEdge('2', '3', $this->faker->randomNumber(2));
        $this->graph->addEdge('3', '4', $this->faker->randomNumber(2));
        $traverse = new DepthFirst();
        $this->assertEquals([0, 2, 3, 4, 1], $traverse->traverse($this->graph, 0));
    }

    public function testGraphTopological()
    {
        $this->directedGraph->addEdge('5', '11', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('11', '2', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('11', '9', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('11', '10', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('7', '8', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('7', '11', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('8', '9', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('3', '8', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('3', '10', $this->faker->randomNumber(2));
        $traverse = new Topological();
        $this->assertEquals([3, 7, 8, 5, 11, 10, 9, 2], $traverse->traverse($this->directedGraph, 5));
    }

    public function testGraphTopologicalException()
    {
        $this->directedGraph->addEdge('5', '11', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('11', '2', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('11', '9', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('11', '10', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('7', '8', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('7', '11', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('8', '9', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('9', '5', $this->faker->randomNumber(2)); // this adds a cycle
        $this->directedGraph->addEdge('3', '8', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('3', '10', $this->faker->randomNumber(2));
        $this->expectException(LogicException::class);
        $traverse = new Topological();
        $this->assertEquals([3, 7, 8, 5, 11, 10, 9, 2], $traverse->traverse($this->directedGraph, 5));
    }
}
