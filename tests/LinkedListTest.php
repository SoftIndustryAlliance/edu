<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use DS\LinkedList\LinkedList;
use Faker;

final class LinkedListTest extends TestCase
{
    protected $faker;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
    }

    public function testLinkedListCreate()
    {
        $linkedList = new LinkedList();
        $linkedList->insert($this->faker->name, $this->faker->sentence);
        $this->assertInstanceOf(LinkedList::class, $linkedList);
        $this->assertEquals(1, $linkedList->count());
    }

    public function testLinkedListInsert()
    {
        $linkedList = new LinkedList();
        for ($i=0; $i<3; $i++) {
            $linkedList->insert($this->faker->name, $this->faker->sentence);
        }
        $this->assertEquals(3, $linkedList->count());
    }

    public function testLinkedListGet()
    {
        $linkedList = new LinkedList();
        $linkedList->insert($this->faker->name, $this->faker->sentence);
        $linkedList->insert('a key 2', 'node value 2');
        $this->assertEquals(2, $linkedList->count());
        $this->assertEquals('node value 2', $linkedList->get('a key 2'));
    }

    public function testLinkedListUpdate()
    {
        $linkedList = new LinkedList();
        $linkedList->insert($this->faker->name, $this->faker->sentence);
        $linkedList->insert('a key 2', 'node value 2');
        $linkedList->insert('a key 2', 'node value 2.0');
        $this->assertEquals(2, $linkedList->count());
        $this->assertEquals('node value 2.0', $linkedList->get('a key 2'));
    }

    public function testLinkedListRemove()
    {
        $linkedList = new LinkedList();
        $linkedList->insert($this->faker->name, $this->faker->sentence);
        $linkedList->insert($this->faker->name, $this->faker->sentence);
        $linkedList->insert('a key 3', 'node value 3');
        $linkedList->remove('a key 3');
        $this->assertEquals(2, $linkedList->count());
    }
}
