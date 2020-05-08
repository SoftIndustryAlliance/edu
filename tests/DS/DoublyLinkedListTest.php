<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use DS\DoublyLinkedList\DoublyLinkedList;
use Faker;

final class DoublyLinkedListTest extends TestCase
{
    protected $faker;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
        $this->linkedList = new DoublyLinkedList();
    }

    public function testDoublyLinkedListCreate()
    {
        $this->linkedList->push($this->faker->name, $this->faker->sentence);
        $this->assertInstanceOf(DoublyLinkedList::class, $this->linkedList);
        $this->assertEquals(1, $this->linkedList->count());
    }

    public function testDoublyLinkedListPush()
    {
        for ($i=0; $i<5; $i++) {
            $this->linkedList->push($this->faker->name, $this->faker->sentence);
        }
        $this->assertEquals(5, $this->linkedList->count());
    }

    public function testDoublyLinkedListPop()
    {
        for ($i=0; $i<5; $i++) {
            $this->linkedList->push($this->faker->name, $this->faker->sentence);
        }
        $this->linkedList->push('testKey', 'Test sentense.');
        $this->assertEquals(6, $this->linkedList->count());
        $node = $this->linkedList->pop();
        $this->assertEquals(5, $this->linkedList->count());
        $this->assertEquals('testKey', $node->getKey());
        $this->assertEquals('Test sentense.', $node->getValue());
    }

    public function testDoublyLinkedListUnshift()
    {
        for ($i=0; $i<5; $i++) {
            $this->linkedList->unshift($this->faker->name, $this->faker->sentence);
        }
        $this->assertEquals(5, $this->linkedList->count());
    }

    public function testDoublyLinkedListShift()
    {
        for ($i=0; $i<5; $i++) {
            $this->linkedList->unshift($this->faker->name, $this->faker->sentence);
        }
        $this->linkedList->unshift('testKey', 'Test sentense.');
        $this->assertEquals(6, $this->linkedList->count());
        $node = $this->linkedList->shift();
        $this->assertEquals(5, $this->linkedList->count());
        $this->assertEquals('testKey', $node->getKey());
        $this->assertEquals('Test sentense.', $node->getValue());
    }

    public function testDoublyLinkedListUnshiftPop()
    {
        $this->linkedList->unshift('testKey', 'Test sentense.');
        for ($i=0; $i<5; $i++) {
            $this->linkedList->unshift($this->faker->name, $this->faker->sentence);
        }
        $this->assertEquals(6, $this->linkedList->count());
        $node = $this->linkedList->pop();
        $this->assertEquals(5, $this->linkedList->count());
        $this->assertEquals('testKey', $node->getKey());
        $this->assertEquals('Test sentense.', $node->getValue());
    }

    public function testDoublyLinkedListPushShift()
    {
        $this->linkedList->push('testKey', 'Test sentense.');
        for ($i=0; $i<5; $i++) {
            $this->linkedList->push($this->faker->name, $this->faker->sentence);
        }
        $this->assertEquals(6, $this->linkedList->count());
        $node = $this->linkedList->shift();
        $this->assertEquals(5, $this->linkedList->count());
        $this->assertEquals('testKey', $node->getKey());
        $this->assertEquals('Test sentense.', $node->getValue());
    }

    public function testDoublyLinkedListShiftEmpty()
    {
        $this->linkedList->unshift('testKey', 'Test sentense.');
        $this->assertEquals(1, $this->linkedList->count());
        $node = $this->linkedList->shift();
        $this->assertEquals(0, $this->linkedList->count());
        $this->assertTrue($this->linkedList->isEmpty());
        $this->assertEquals('testKey', $node->getKey());
        $this->assertEquals('Test sentense.', $node->getValue());
    }

    public function testDoublyLinkedListPopEmpty()
    {
        $this->linkedList->push('testKey', 'Test sentense.');
        $this->assertEquals(1, $this->linkedList->count());
        $node = $this->linkedList->pop();
        $this->assertEquals(0, $this->linkedList->count());
        $this->assertTrue($this->linkedList->isEmpty());
        $this->assertEquals('testKey', $node->getKey());
        $this->assertEquals('Test sentense.', $node->getValue());
    }

    public function testDoublyLinkedOffsetGet()
    {
        $this->linkedList->push('testKey', 'Test sentense.');
        $this->linkedList->push('testKey1', 'Test sentense.1');
        $this->linkedList->push('testKey2', 'Test sentense.2');
        $node = $this->linkedList->offsetGet(0);
        $this->assertEquals('testKey', $node->getKey());
        $this->assertEquals('Test sentense.', $node->getValue());
        $node = $this->linkedList->offsetGet(1);
        $this->assertEquals('testKey1', $node->getKey());
        $this->assertEquals('Test sentense.1', $node->getValue());
        $node = $this->linkedList->offsetGet(2);
        $this->assertEquals('testKey2', $node->getKey());
        $this->assertEquals('Test sentense.2', $node->getValue());
    }

    public function testDoublyLinkedOffsetUnsetFirst()
    {
        $this->linkedList->push('testKey', 'Test sentense.');
        $this->linkedList->push('testKey1', 'Test sentense.1');
        $this->linkedList->push('testKey2', 'Test sentense.2');
        $node = $this->linkedList->offsetUnset(0);
        $this->assertEquals(2, $this->linkedList->count());
        $node = $this->linkedList->offsetGet(0);
        $this->assertEquals('testKey1', $node->getKey());
        $this->assertEquals('Test sentense.1', $node->getValue());
        $node = $this->linkedList->offsetGet(1);
        $this->assertEquals('testKey2', $node->getKey());
        $this->assertEquals('Test sentense.2', $node->getValue());
    }

    public function testDoublyLinkedOffsetUnsetLast()
    {
        $this->linkedList->push('testKey', 'Test sentense.');
        $this->linkedList->push('testKey1', 'Test sentense.1');
        $this->linkedList->push('testKey2', 'Test sentense.2');
        $node = $this->linkedList->offsetUnset(2);
        $this->assertEquals(2, $this->linkedList->count());
        $node = $this->linkedList->offsetGet(0);
        $this->assertEquals('testKey', $node->getKey());
        $this->assertEquals('Test sentense.', $node->getValue());
        $node = $this->linkedList->offsetGet(1);
        $this->assertEquals('testKey1', $node->getKey());
        $this->assertEquals('Test sentense.1', $node->getValue());
    }

    public function testDoublyLinkedOffsetUnsetMiddle()
    {
        $this->linkedList->push('testKey', 'Test sentense.');
        $this->linkedList->push('testKey1', 'Test sentense.1');
        $this->linkedList->push('testKey2', 'Test sentense.2');
        $node = $this->linkedList->offsetUnset(1);
        $this->assertEquals(2, $this->linkedList->count());
        $node = $this->linkedList->offsetGet(0);
        $this->assertEquals('testKey', $node->getKey());
        $this->assertEquals('Test sentense.', $node->getValue());
        $node = $this->linkedList->offsetGet(1);
        $this->assertEquals('testKey2', $node->getKey());
        $this->assertEquals('Test sentense.2', $node->getValue());
    }

    public function testDoublyLinkedOffsetUnsetAll()
    {
        $this->linkedList->push('testKey', 'Test sentense.');
        $this->linkedList->push('testKey1', 'Test sentense.1');
        $node = $this->linkedList->offsetUnset(1);
        $node = $this->linkedList->offsetUnset(0);
        $this->assertEquals(0, $this->linkedList->count());
        $this->assertTrue($this->linkedList->isEmpty());
    }
}
