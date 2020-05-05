<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Algo\Sort\SelectionSort;
use Algo\Sort\BubbleSort;
use Faker;

final class SortTest extends TestCase
{
    protected $faker;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
    }

    protected function isSorted(array &$array): bool
    {
        for ($i=0, $size = count($array); $i < $size; $i++) {
            if ($i > 0 && $array[$i-1] > $array[$i]) {
                return false;
            }
        }
        return true;
    }

    public function testSelectionSort()
    {
        $array = [];
        for ($i=0; $i<10; $i++) {
            $array[] = $this->faker->randomNumber(3);
        }
        $this->assertTrue(SelectionSort::sort($array));
        $this->assertTrue($this->isSorted($array));
    }

    public function testBubbleSort()
    {
        $array = [];
        for ($i=0; $i<10; $i++) {
            $array[] = $this->faker->randomNumber(3);
        }
        $this->assertTrue(BubbleSort::sort($array));
        $this->assertTrue($this->isSorted($array));
    }
}
