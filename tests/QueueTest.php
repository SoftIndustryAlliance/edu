<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use DS\Queue\Queue;
use Faker;

final class QueueTest extends TestCase
{
    protected $faker;
    protected $queue;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
        $this->queue = new Queue();
    }

    public function testQueue()
    {
        $this->queue->enqueue('test');
        $this->queue->enqueue($this->faker->name);
        $this->queue->enqueue($this->faker->name);
        $this->queue->enqueue($this->faker->name);
        $this->assertEquals('test', $this->queue->dequeue());
    }

    public function testQueuePeek()
    {
        $this->queue->enqueue('test');
        $this->queue->enqueue($this->faker->name);
        $this->queue->enqueue($this->faker->name);
        $this->queue->enqueue($this->faker->name);
        $this->assertEquals('test', $this->queue->peek());
    }

    public function testQueueDequeueEmptyList()
    {
        $this->queue->enqueue('test');
        $this->queue->enqueue($this->faker->name);
        $this->queue->dequeue();
        $this->queue->dequeue();
        $this->assertNull($this->queue->dequeue());
    }
}
