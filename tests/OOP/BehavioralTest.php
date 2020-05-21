<?php

namespace Tests\OOP;

use PHPUnit\Framework\TestCase;
use OOP\Behavioral\ChainOfResponsibility;
use Faker;

final class StructuralTest extends TestCase
{
    protected $faker;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
    }

    public function testChainOfResponsibility()
    {
        $handler = new ChainOfResponsibility\AccessHandler();
        $handler->nextHandler(new ChainOfResponsibility\AvailabilityHandler());

        $request = new ChainOfResponsibility\Request('admin@report.io', 123);
        $report = new ChainOfResponsibility\Report($handler);
        $this->assertStringContainsString(
            'Report for key ',
            $report->getReport($request)
        );

        $request = new ChainOfResponsibility\Request('admin@report.io', 12300);
        $this->assertNull($report->getReport($request));

        $request = new ChainOfResponsibility\Request('user@report.io', 123);
        $this->assertNull($report->getReport($request));
    }
}
