<?php

namespace Algo\Graph;

use DS\Stack\Stack;
use DS\Graph\GraphInterface;
use \LogicException;

/**
 * Implements Depth-First search approach.
 */
class Topological implements TraverseInterface
{
    private $visited;
    private $stack;
    private const TEMPORARY = false; // temporary mark to detect non-DAG
    private const PERMANENT = true; // permanent visited mark

    public function __construct()
    {
        $this->visited = [];
        $this->stack = new Stack();
    }

    public function traverse(GraphInterface $graph, int $vertex): array
    {
        $this->visited = [];
        $result = [];
        $vertices = $graph->getVertices();
        $size = count($vertices);
        $allVisited = false;

        // start with the passed $vertex
        $this->visit($graph, $vertex);

        while (!$allVisited) {
            $allVisited = true;
            for ($i=0; $i<$size; $i++) {
                if (!isset($this->visited[$vertices[$i]]) || $this->visited[$vertices[$i]] === self::TEMPORARY) {
                    $allVisited = false;
                    $this->visit($graph, $vertices[$i]);
                }
            }
        }

        while (!$this->stack->isEmpty()) {
            $result[] = $this->stack->pop();
        }

        return $result;
    }

    private function visit(GraphInterface $graph, int $vertex)
    {
        if (isset($this->visited[$vertex]) && $this->visited[$vertex] === self::PERMANENT) {
            // already visited this node
            return;
        }

        if (isset($this->visited[$vertex]) && $this->visited[$vertex] === self::TEMPORARY) {
            // not a DAG
            throw new LogicException("Should be a Directed Acyclic Graph.");
        }

        // mark as temporary visited
        $this->visited[$vertex] = self::TEMPORARY;

        $adjasentNodes = $graph->getVertex($vertex);
        if ($adjasentNodes !== null) {
            foreach ($adjasentNodes as $destVertex => $node) {
                $this->visit($graph, $destVertex);
            }
        }

        // mark as permanently visited; add to stack
        $this->visited[$vertex] = self::PERMANENT;
        $this->stack->push($vertex);
    }
}
