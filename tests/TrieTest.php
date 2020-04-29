<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use DS\Trie\Trie;
use Faker;

final class TrieTest extends TestCase
{
    protected $faker;
    protected $trie;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
        $this->trie = new Trie();
    }

    public function testTrieInsert()
    {
        $this->trie->insert('cat', 'cat');
        $this->trie->insert('cats', 'cats');
        $this->assertEquals('cat', $this->trie->find('cat'));
        $this->assertEquals('cats', $this->trie->find('cats'));
    }
}
