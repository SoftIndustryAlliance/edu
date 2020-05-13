<?php

namespace Algo\Graph;

use DS\Queue\Queue;
use DS\Graph\Graph;

class BreadthFirst implements TraverseInterface
{
    private $visited;
    private $queue;

    public function __construct()
    {
        $this->visited = [];
        $this->queue = new Queue();
    }

    public function traverse(Graph $graph, int $vertex): array
    {
        $this->queue->enqueue($vertex);
        $this->visited[$vertex] = 1;
        $result = [];

        while (!$this->queue->isEmpty()) {
            $currentVertex = $this->queue->dequeue();
            $result[] = $currentVertex;
            $adjasentNodes = $graph->getVertex($currentVertex);

            foreach ($adjasentNodes as $destVertex => $node) {
                if (isset($this->visited[$destVertex])) {
                    continue;
                }
                $this->queue->enqueue($destVertex);
                $this->visited[$destVertex] = 1;
            }
        }
        return $result;
    }
}
