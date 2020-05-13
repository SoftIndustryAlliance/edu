<?php

namespace Tests\DS;

use PHPUnit\Framework\TestCase;
use DS\Heap\MinHeap;
use Faker;

final class HeapTest extends TestCase
{
    protected $faker;
    protected $heap;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
        $this->heap = new MinHeap();
    }

    public function testMinHeapAdd()
    {
        for ($i=0; $i<10; $i++) {
            $this->heap->add($this->faker->randomNumber(3));
        }
        $this->assertEquals(10, $this->heap->getSize());
    }

    public function testMinHeapPeek()
    {
        for ($i=0; $i<10; $i++) {
            $this->heap->add($this->faker->randomNumber(3));
        }
        $this->assertEquals(10, $this->heap->getSize());
        $this->assertIsInt($this->heap->peek());
    }

    public function testMinHeapPoll()
    {
        for ($i=0; $i<10; $i++) {
            $this->heap->add($this->faker->randomNumber(3));
        }
        $this->assertEquals(10, $this->heap->getSize());
        $this->assertIsInt($this->heap->poll());
        $this->assertEquals(9, $this->heap->getSize());
    }

    public function testMinHeapCapacity()
    {
        for ($i=0; $i<15; $i++) {
            $this->heap->add($this->faker->randomNumber(3));
        }
        $this->assertEquals(15, $this->heap->getSize());
        $this->assertEquals(20, $this->heap->getCapacity());
        $this->assertIsInt($this->heap->peek());
    }
}
