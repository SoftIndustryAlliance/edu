<?php

namespace Algo\Graph;

use DS\Stack\Stack;
use DS\Graph\Graph;

class DepthFirst implements TraverseInterface
{
    private $visited;
    private $stack;

    public function __construct()
    {
        $this->visited = [];
        $this->stack = new Stack();
    }

    public function traverse(Graph $graph, int $vertex): array
    {
        $this->stack->push($vertex);
        $this->visited[$vertex] = 1;
        $result = [];

        while (!$this->stack->isEmpty()) {
            $currentVertex = $this->stack->pop();
            $result[] = $currentVertex;
            $adjasentNodes = $graph->getVertex($currentVertex);

            foreach ($adjasentNodes as $destVertex => $node) {
                if (isset($this->visited[$destVertex])) {
                    continue;
                }
                $this->stack->push($destVertex);
                $this->visited[$destVertex] = 1;
            }
        }
        return $result;
    }
}
