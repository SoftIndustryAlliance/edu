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

    public function testTrieFindDeepestNodeValue()
    {
        $this->trie->insert('car', 'car');
        $this->trie->insert('cars', 'cars');
        $this->trie->insert('card', 'card');
        $this->trie->insert('cards', 'cards');
        $this->trie->insert('carpet', 'carpet');
        $this->trie->insert('carpets', 'carpets');
        $this->trie->insert('careful', 'careful');
        $this->trie->insert('carpenter', 'carpenter');
        $this->trie->insert('authentication', 'authentication');
        $this->assertEquals('carpenter', $this->trie->findDeepestNodeValue('car'));
    }

    public function testTrieFindSuggestions()
    {
        $this->trie->insert('car', 'car');
        $this->trie->insert('cars', 'cars');
        $this->trie->insert('card', 'card');
        $this->trie->insert('cards', 'cards');
        $this->trie->insert('authentication', 'authentication');
        $this->assertIsArray($this->trie->findSuggestions('car'));
        $this->assertEquals(array('car', 'cars', 'card', 'cards'), $this->trie->findSuggestions('car'));
    }
}
