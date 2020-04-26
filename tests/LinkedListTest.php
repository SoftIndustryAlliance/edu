<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use DS\LinkedList\LinkedList;

final class LinkedListTest extends TestCase
{
    public function testLinkedListCreate()
    {
        $linkedList = new LinkedList('a key', 'node value');
        $this->assertInstanceOf(LinkedList::class, $linkedList);
        $this->assertEquals(1, $linkedList->count());
    }

    public function testLinkedListInsert()
    {
        $linkedList = new LinkedList('a key 1', 'node value 1');
        $linkedList->insert('a key 2', 'node value 2');
        $linkedList->insert('a key 3', 'node value 3');
        $this->assertEquals(3, $linkedList->count());
    }

    public function testLinkedListGet()
    {
        $linkedList = new LinkedList('a key 1', 'node value 1');
        $linkedList->insert('a key 2', 'node value 2');
        $this->assertEquals(2, $linkedList->count());
        $this->assertEquals('node value 2', $linkedList->get('a key 2'));
    }

    public function testLinkedListUpdate()
    {
        $linkedList = new LinkedList('a key 1', 'node value 1');
        $linkedList->insert('a key 2', 'node value 2');
        $linkedList->insert('a key 2', 'node value 2.0');
        $this->assertEquals(2, $linkedList->count());
        $this->assertEquals('node value 2.0', $linkedList->get('a key 2'));
    }

    public function testLinkedListRemove()
    {
        $linkedList = new LinkedList('a key 1', 'node value 1');
        $linkedList->insert('a key 2', 'node value 2');
        $linkedList->insert('a key 3', 'node value 3');
        $linkedList->remove('a key 3');
        $this->assertEquals(2, $linkedList->count());
    }
}
