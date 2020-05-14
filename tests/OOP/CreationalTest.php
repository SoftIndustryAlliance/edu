<?php

namespace Tests\OOP;

use PHPUnit\Framework\TestCase;
use OOP\Creational\AbstractFactory\Report;
use OOP\Creational\AbstractFactory\PDFReportFactory;
use OOP\Creational\AbstractFactory\HTMLReportFactory;
use Faker;

final class CreationalTest extends TestCase
{
    protected $faker;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
    }

    public function testAbstractFactory()
    {
        // generate a PDF report
        $report = new Report(new PDFReportFactory());
        $this->assertStringContainsString(
            'This is a PDF report builder',
            $report->printReport($this->faker->randomNumber(3))
        );

        // generate a HTML report
        $report = new Report(new HTMLReportFactory());
        $this->assertStringContainsString(
            'This is a HTML report builder',
            $report->printReport($this->faker->randomNumber(3))
        );
    }
}
