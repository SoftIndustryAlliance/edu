<?php

namespace Algo\Graph;

use DS\Graph\Graph;

interface TraverseInterface
{
    public function traverse(Graph $graph, int $vertex): array;
}
