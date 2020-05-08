<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use DS\HashTable\StringHasher;

final class StringHasherTest extends TestCase
{
    public function testStringHasher()
    {
        $hasher = new StringHasher();
        $hashCode = $hasher->getHashCode('ddnqavbjaoffckzdqcdhomua');
        $this->assertInstanceOf(StringHasher::class, $hasher);
        $this->assertIsInt($hashCode);
    }
}
