<?php

namespace DS\Graph;

use DS\LinkedList\LinkedList;

interface GraphInterface
{
    public function addEdge(int $source, int $dest, int $weight);
    public function removeEdge(int $source, int $dest): bool;
    public function getEdge(int $source, int $dest);
    public function getVertex(int $source): ?LinkedList;
}
