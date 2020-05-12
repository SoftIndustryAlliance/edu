<?php

namespace DS\Graph;

use DS\LinkedList\LinkedList;

/**
 * Graph implementation using Adjacency List.
 */
class Graph implements GraphInterface
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
        $this->graph[$dest]->insert($source, $weight);
    }

    public function removeEdge(int $source, int $dest): bool
    {
        if (!isset($this->graph[$source]) || !isset($this->graph[$source])) {
            return false;
        }
        return $this->graph[$source]->remove($dest) && $this->graph[$dest]->remove($source);
    }

    /**
     * Returns value of a node - in this case the edge weight.
     */
    public function getEdge(int $source, int $dest)
    {
        if (!isset($this->graph[$source]) || !isset($this->graph[$source])) {
            return null;
        }
        return $this->graph[$source]->get($dest);
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
