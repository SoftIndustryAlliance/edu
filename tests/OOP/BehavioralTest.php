<?php

namespace Tests\OOP;

use PHPUnit\Framework\TestCase;
use OOP\Behavioral\ChainOfResponsibility;
use OOP\Behavioral\Command;
use OOP\Behavioral\Iterator;
use Faker;

final class BehavioralTest extends TestCase
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

    public function testCommand()
    {
        $key = $this->faker->randomNumber(3);
        $report = new Command\Report($key);
        $generateCommand = new Command\GenerateCommand($report);
        $enableHeaderCommand = new Command\EnableHeaderCommand($report);

        $invoker = new Command\ReportPage($report);
        $invoker->setGenerateCommand($generateCommand);
        $invoker->setEnableHeaderCommand($enableHeaderCommand);

        $this->assertStringNotContainsString(
            'Report header',
            $invoker->show(false)
        );

        $this->assertStringContainsString(
            'Report header',
            $invoker->show(true)
        );
    }

    public function testIterator()
    {
        $report = new Iterator\Report();
        for ($i=0; $i<10; $i++) {
            $report->addPage('Page content '.$i);
        }

        $this->assertInstanceOf(\Traversable::class, $report);
    }
}
