<?php

namespace Tests\DS;

use PHPUnit\Framework\TestCase;
use DS\Graph\Graph;
use DS\Graph\DirectedGraph;
use DS\LinkedList\LinkedList;
use Faker;

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

    public function testGraphGetEdge()
    {
        $this->graph->addEdge('0', '1', $this->faker->randomNumber(2));
        $this->graph->addEdge('0', '2', 16);
        $this->graph->addEdge('2', '3', $this->faker->randomNumber(2));

        $this->assertEquals(16, $this->graph->getEdge('0', '2'));
        $this->assertNull($this->graph->getEdge('4', '2'));
    }

    public function testGraphRemoveEdge()
    {
        $this->graph->addEdge('0', '1', $this->faker->randomNumber(2));
        $this->graph->addEdge('0', '2', $this->faker->randomNumber(2));
        $this->graph->addEdge('2', '3', $this->faker->randomNumber(2));

        $this->assertFalse($this->graph->removeEdge('4', '2'));
        $this->assertTrue($this->graph->removeEdge('0', '2'));
        $this->assertNull($this->graph->getEdge('0', '2'));
        $this->assertNull($this->graph->getEdge('2', '0'));
    }

    public function testGraphGetVertex()
    {
        $this->graph->addEdge('0', '1', $this->faker->randomNumber(2));
        $this->graph->addEdge('0', '2', 16);
        $this->graph->addEdge('2', '3', $this->faker->randomNumber(2));

        $this->assertInstanceOf(LinkedList::class, $this->graph->getVertex('3'));
        $this->assertNull($this->graph->getVertex('4'));
    }

    public function testGraphGetVertices()
    {
        $this->graph->addEdge('0', '5', $this->faker->randomNumber(2));
        $this->graph->addEdge('0', '2', 16);
        $this->graph->addEdge('2', '3', $this->faker->randomNumber(2));

        $this->assertEquals([0, 5, 2, 3], $this->graph->getVertices());
    }

    public function testDirectedGraphGetEdge()
    {
        $this->directedGraph->addEdge('0', '1', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('0', '2', 16);
        $this->directedGraph->addEdge('2', '3', $this->faker->randomNumber(2));

        $this->assertEquals(16, $this->directedGraph->getEdge('0', '2'));
        $this->assertNull($this->directedGraph->getEdge('2', '0'));
    }

    public function testDirectedGraphRemoveEdge()
    {
        $this->directedGraph->addEdge('0', '1', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('0', '2', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('2', '3', $this->faker->randomNumber(2));

        $this->assertFalse($this->directedGraph->removeEdge('4', '2'));
        $this->assertTrue($this->directedGraph->removeEdge('0', '2'));
        $this->assertNull($this->directedGraph->getEdge('0', '2'));
        $this->assertNull($this->directedGraph->getEdge('2', '0'));
    }

    public function testDirectedGraphGetVertex()
    {
        $this->directedGraph->addEdge('0', '1', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('0', '2', 16);
        $this->directedGraph->addEdge('2', '3', $this->faker->randomNumber(2));

        $this->assertInstanceOf(LinkedList::class, $this->directedGraph->getVertex('3'));
        $this->assertNull($this->directedGraph->getVertex('4'));
    }

    public function testDirectedGraphGetVertices()
    {
        $this->directedGraph->addEdge('0', '5', $this->faker->randomNumber(2));
        $this->directedGraph->addEdge('0', '2', 16);
        $this->directedGraph->addEdge('2', '3', $this->faker->randomNumber(2));

        $this->assertEquals([0, 5, 2, 3], $this->directedGraph->getVertices());
    }
}
