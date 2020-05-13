<?php

namespace Algo\Graph;

use DS\Graph\GraphInterface;

interface TraverseInterface
{
    public function traverse(GraphInterface $graph, int $vertex): array;
}
