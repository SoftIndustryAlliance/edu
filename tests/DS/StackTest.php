<?php

namespace Tests\DS;

use PHPUnit\Framework\TestCase;
use DS\Stack\Stack;
use Faker;

final class StackTest extends TestCase
{
    protected $faker;
    protected $stack;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
        $this->stack = new Stack();
    }

    public function testStack()
    {
        $this->stack->push($this->faker->name);
        $this->stack->push('test');
        $this->assertEquals('test', $this->stack->pop());
    }

    public function testStackPeek()
    {
        $this->stack->push($this->faker->name);
        $this->stack->push('test');
        $this->assertEquals('test', $this->stack->peek());
    }

    public function testStackPopEmptyList()
    {
        $this->stack->push('test');
        $this->stack->push($this->faker->name);
        $this->stack->pop();
        $this->stack->pop();
        $this->assertNull($this->stack->pop());
    }
}
