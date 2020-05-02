<?php

namespace DS\Stack;

interface StackInterface
{
    public function isEmpty();
    public function peek();
    public function push($data);
    public function pop();
}
