<?php

namespace Tests\OOP;

use PHPUnit\Framework\TestCase;
use OOP\Creational\AbstractFactory\Report;
use OOP\Creational\AbstractFactory\PDFReportFactory;
use OOP\Creational\AbstractFactory\HTMLReportFactory;
use OOP\Creational\Builder\ReportPage;
use OOP\Creational\Builder\Director;
use OOP\Creational\Builder\FullReport;
use OOP\Creational\Builder\SimpleReport;
use OOP\Creational\FactoryMethod\HTMLReportPage;
use OOP\Creational\FactoryMethod\PDFReportPage;
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

    public function testBuilder()
    {
        // generate a simple report
        $report = new ReportPage(new Director(new SimpleReport()));
        $this->assertStringContainsString(
            'This is a simple header for',
            $report->printReport($this->faker->randomNumber(3))
        );

        // generate a full report
        $report = new ReportPage(new Director(new FullReport()));
        $this->assertStringContainsString(
            'This is a pager for',
            $report->printReport($this->faker->randomNumber(3))
        );
    }

    public function testFactoryMethod()
    {
        // generate a PDF report
        $report = new PDFReportPage();
        $this->assertStringContainsString(
            'This is a PDF report builder',
            $report->makeReport()->printReport($this->faker->randomNumber(3))
        );

        // generate a HTML report
        $report = new HTMLReportPage();
        $this->assertStringContainsString(
            'This is a HTML report builder',
            $report->makeReport()->printReport($this->faker->randomNumber(3))
        );
    }

    public function testPrototype()
    {
        $report = new \OOP\Creational\Prototype\Report($this->faker->randomNumber(3));
        $reportPage = new \OOP\Creational\Prototype\ReportPage($report);
        $reportPage->setTitle('A report page title.');
        $reportPage->setFooter('A report page footer.');
        for ($i=1; $i<=10; $i++) {
            $reportPage = clone $reportPage;
            $this->assertStringContainsString(
                'Content for page number '.$i,
                $reportPage->printPage()
            );
        }
    }
}
