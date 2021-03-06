<?php

namespace DS\Graph;

use DS\LinkedList\LinkedList;

/**
 * Directed graph implementation using Adjacency List.
 */
class DirectedGraph implements GraphInterface
{
    private $graph = [];

    public function addEdge(int $source, int $dest, int $weight)
    {
        // add edge for source -> dest
        if (!isset($this->graph[$source])) {
            $this->graph[$source] = new LinkedList();
        }
        $this->graph[$source]->insert($dest, $weight);

        // add edge for dest -> source
        if (!isset($this->graph[$dest])) {
            $this->graph[$dest] = new LinkedList();
        }
    }

    public function removeEdge(int $source, int $dest): bool
    {
        if (!isset($this->graph[$source])) {
            return false;
        }
        return $this->graph[$source]->remove($dest);
    }

    /**
     * Returns value of a node - in this case the edge weight.
     */
    public function getEdge(int $source, int $dest)
    {
        if (!isset($this->graph[$source])) {
            return null;
        }
        return $this->graph[$source]->get($dest);
    }

    /**
     * Get vertex's adjasent nodes.
     */
    public function getVertex(int $source): ?LinkedList
    {
        if (!isset($this->graph[$source])) {
            return null;
        }
        return $this->graph[$source];
    }

    /**
     * Get all vertices.
     */
    public function getVertices(): array
    {
        return array_keys($this->graph);
    }

    public function printGraph()
    {
        $verticesCount = count($this->graph);
        for ($i=0; $i<$verticesCount; $i++) {
            echo 'Adjacency list of vertex ' . $i . PHP_EOL.'head ';
            foreach ($this->graph[$i] as $dest => $node) {
                echo ' -> ' . $dest . '(' . $node->getValue() . ')';
            }
            echo PHP_EOL;
        }
    }
}
