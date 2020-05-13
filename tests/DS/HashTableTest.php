<?php

namespace Tests\DS;

use PHPUnit\Framework\TestCase;
use DS\HashTable\HashTable;
use DS\HashTable\StringHasher;
use Faker;

final class HashTableTest extends TestCase
{
    protected $faker;
    protected $hashTable;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
        $hasher = new StringHasher();
        $this->hashTable = new HashTable($hasher);
    }

    public function testHashTablePut()
    {
        $this->assertTrue($this->hashTable->put($this->faker->name, $this->faker->sentence));
    }

    public function testHashTableGet()
    {
        for ($i = 0; $i<1000; $i++) {
            $this->hashTable->put($this->faker->name, $this->faker->sentence);
        }
        $key = $this->faker->name;
        $value = $this->faker->sentence;
        $this->assertTrue($this->hashTable->put($key, $value));
        $this->assertEquals($value, $this->hashTable->get($key));
    }

    public function testHashTableRemove()
    {
        for ($i = 0; $i<1000; $i++) {
            $this->hashTable->put($this->faker->name, $this->faker->sentence);
        }
        $key = $this->faker->name;
        $value = $this->faker->sentence;
        $this->assertTrue($this->hashTable->put($key, $value));
        $this->assertTrue($this->hashTable->remove($key));
        $this->assertNull($this->hashTable->get($key));
    }

    public function testHashTableScaleTest()
    {
        for ($i = 0; $i<190; $i++) {
            $this->hashTable->put($this->faker->name, $this->faker->sentence);
        }
        $key = $this->faker->name;
        $value = $this->faker->sentence;
        $this->assertTrue($this->hashTable->put($key, $value));

        $key1 = $this->faker->name;
        $value1 = $this->faker->sentence;
        $this->assertTrue($this->hashTable->put($key1, $value1));


        $key2 = $this->faker->name;
        $value2 = $this->faker->sentence;
        $this->assertTrue($this->hashTable->put($key2, $value2));

        $this->assertEquals($value, $this->hashTable->get($key));
        $this->assertEquals($value1, $this->hashTable->get($key1));
        $this->assertEquals($value2, $this->hashTable->get($key2));

        $this->assertTrue($this->hashTable->remove($key));
        $this->assertTrue($this->hashTable->remove($key1));
        $this->assertTrue($this->hashTable->remove($key2));
    }
}
