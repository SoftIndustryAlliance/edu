<?php

namespace Algo\Graph;

use DS\Queue\Queue;
use DS\Graph\GraphInterface;

class BreadthFirst implements TraverseInterface
{
    private $visited;
    private $queue;

    public function __construct()
    {
        $this->visited = [];
        $this->queue = new Queue();
    }

    public function traverse(GraphInterface $graph, int $vertex): array
    {
        $this->visited = [];
        $result = [];

        $this->queue->enqueue($vertex);
        $this->visited[$vertex] = 1;

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
