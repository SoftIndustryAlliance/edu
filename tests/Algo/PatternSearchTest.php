<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Algo\PatternSearch\NaiveSearch;
use Algo\PatternSearch\KMPSearch;
use Faker;

final class PatternSearchTest extends TestCase
{
    protected $faker;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
    }

    protected function isFound(array $array): bool
    {
        if (count($array)) {
            return true;
        }
        return false;
    }

    public function testNaiveSearch()
    {
        $string = 'AABAACAADAABAABA';
        $pattern = 'AABA';
        $result = NaiveSearch::search($string, $pattern);

        $this->assertTrue($this->isFound($result));
        $this->assertEquals([0,9,12], $result);
    }

    public function testNaiveSearchNotFound()
    {
        $string = 'AABAACAADAABAABA';
        $pattern = 'AAF';
        $result = NaiveSearch::search($string, $pattern);

        $this->assertFalse($this->isFound($result));
        $this->assertEquals([], $result);
    }

    public function testKMPSearch()
    {
        $string = 'AABAACAADAABAABA';
        $pattern = 'AABA';
        $result = KMPSearch::search($string, $pattern);

        $this->assertTrue($this->isFound($result));
        $this->assertEquals([0,9,12], $result);
    }

    public function testKMPSearchNotFound()
    {
        $string = 'AABAACAADAABAABA';
        $pattern = 'AAF';
        $result = KMPSearch::search($string, $pattern);

        $this->assertFalse($this->isFound($result));
        $this->assertEquals([], $result);
    }
}
