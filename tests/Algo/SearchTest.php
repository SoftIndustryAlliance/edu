<?php

namespace Tests\Algo;

use PHPUnit\Framework\TestCase;
use Algo\Search\LinearSearch;
use Algo\Search\BinarySearch;
use Algo\Search\JumpSearch;
use Algo\Search\InterpolationSearch;
use Algo\Sort\QuickSort;
use Faker;

final class SearchTest extends TestCase
{
    protected $faker;
    protected $array = [];
    protected $item;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();

        $this->item = $this->faker->randomNumber(3);
        for ($i=0; $i<10; $i++) {
            $this->array[] = $this->faker->randomNumber(3);
        }
        $this->array[$this->faker->numberBetween(0, 9)] = $this->item;
        QuickSort::sort($this->array);
    }

    protected function isFound(array $array, int $item, int $position): bool
    {
        if ($array[$position] === $item) {
            return true;
        }
        return false;
    }

    public function testLinearSearch()
    {
        $position = LinearSearch::search($this->array, $this->item);
        $this->assertTrue($this->isFound($this->array, $this->item, $position));
    }

    public function testLinearSearchNotFound()
    {
        $this->assertEquals(-1, LinearSearch::search($this->array, $this->faker->randomNumber(4)));
    }

    public function testBinarySearch()
    {
        $position = BinarySearch::search($this->array, $this->item);
        $this->assertTrue($this->isFound($this->array, $this->item, $position));
    }

    public function testBinarySearchNotFound()
    {
        $this->assertEquals(-1, BinarySearch::search($this->array, $this->faker->randomNumber(4)));
    }

    public function testJumpSearch()
    {
        $position = JumpSearch::search($this->array, $this->item);
        $this->assertTrue($this->isFound($this->array, $this->item, $position));
    }

    public function testJumpSearchNotFound()
    {
        $this->assertEquals(-1, JumpSearch::search($this->array, $this->faker->randomNumber(4)));
    }

    public function testInterpolationSearch()
    {
        $position = InterpolationSearch::search($this->array, $this->item);
        $this->assertTrue($this->isFound($this->array, $this->item, $position));
    }

    public function testInterpolationSearchNotFound()
    {
        $this->assertEquals(-1, InterpolationSearch::search($this->array, $this->faker->randomNumber(3)));
    }
}
