<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use DS\Queue\Queue;
use Faker;

final class LinkedListTest extends TestCase
{
    protected $faker;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
    }

    public function testQueue()
    {
        $queue = new Queue();
        $queue->enqueue('test');
        $queue->enqueue($this->faker->name);
        $this->assertEquals('test', $queue->dequeue());
    }

    public function testQueueDequeueEmptyList()
    {
        $queue = new Queue();
        $queue->enqueue('test');
        $queue->enqueue($this->faker->name);
        $queue->dequeue();
        $queue->dequeue();
        $this->assertNull($queue->dequeue());
    }
}
