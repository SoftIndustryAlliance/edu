<?php

namespace Tests\DS;

use PHPUnit\Framework\TestCase;
use DS\LinkedList\CircularLinkedList;
use Faker;

final class CircularLinkedListTest extends TestCase
{
    protected $faker;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
        $this->linkedList = new CircularLinkedList();
    }

    public function testLinkedListCreate()
    {
        $this->linkedList->insert($this->faker->name, $this->faker->sentence);
        $this->assertInstanceOf(CircularLinkedList::class, $this->linkedList);
        $this->assertEquals(1, $this->linkedList->count());
    }

    public function testLinkedListInsert()
    {
        for ($i=0; $i<3; $i++) {
            $this->linkedList->insert($this->faker->name, $this->faker->sentence);
        }
        $this->assertEquals(3, $this->linkedList->count());
    }

    public function testLinkedListGet()
    {
        $this->linkedList->insert($this->faker->name, $this->faker->sentence);
        $this->linkedList->insert('a key 2', 'node value 2');
        $this->assertEquals(2, $this->linkedList->count());
        $this->assertEquals('node value 2', $this->linkedList->get('a key 2'));
    }

    public function testLinkedListUpdate()
    {
        $this->linkedList->insert($this->faker->name, $this->faker->sentence);
        $this->linkedList->insert('a key 2', 'node value 2');
        $this->linkedList->insert('a key 2', 'node value 2.0');
        $this->assertEquals(2, $this->linkedList->count());
        $this->assertEquals('node value 2.0', $this->linkedList->get('a key 2'));
    }

    public function testLinkedListRemove()
    {
        $this->linkedList->insert($this->faker->name, $this->faker->sentence);
        $this->linkedList->insert($this->faker->name, $this->faker->sentence);
        $this->linkedList->insert('a key 3', 'node value 3');
        $this->linkedList->remove('a key 3');
        $this->assertEquals(2, $this->linkedList->count());
    }
}
