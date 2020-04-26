<?php
namespace DS\HashTable;

/**
 * Interface for the HashMap hashing function.
 */
interface HasherInterface
{
    public function getHashCode($key): int;
}
