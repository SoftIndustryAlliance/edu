<?php

namespace Tests\OOP;

use PHPUnit\Framework\TestCase;
use OOP\Creational\AbstractFactory;
use OOP\Creational\Builder;
use OOP\Creational\FactoryMethod;
use OOP\Creational\Prototype;
use OOP\Creational\Singleton;
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
        $report = new AbstractFactory\Report(new AbstractFactory\PDFReportFactory());
        $this->assertStringContainsString(
            'This is a PDF report builder',
            $report->printReport($this->faker->randomNumber(3))
        );

        // generate a HTML report
        $report = new AbstractFactory\Report(new AbstractFactory\HTMLReportFactory());
        $this->assertStringContainsString(
            'This is a HTML report builder',
            $report->printReport($this->faker->randomNumber(3))
        );
    }

    public function testBuilder()
    {
        // generate a simple report
        $report = new Builder\ReportPage(new Builder\Director(new Builder\SimpleReport()));
        $this->assertStringContainsString(
            'This is a simple header for',
            $report->printReport($this->faker->randomNumber(3))
        );

        // generate a full report
        $report = new Builder\ReportPage(new Builder\Director(new Builder\FullReport()));
        $this->assertStringContainsString(
            'This is a pager for',
            $report->printReport($this->faker->randomNumber(3))
        );
    }

    public function testFactoryMethod()
    {
        // generate a PDF report
        $report = new FactoryMethod\PDFReportPage();
        $this->assertStringContainsString(
            'This is a PDF report builder',
            $report->makeReport()->printReport($this->faker->randomNumber(3))
        );

        // generate a HTML report
        $report = new FactoryMethod\HTMLReportPage();
        $this->assertStringContainsString(
            'This is a HTML report builder',
            $report->makeReport()->printReport($this->faker->randomNumber(3))
        );
    }

    public function testPrototype()
    {
        $report = new Prototype\Report($this->faker->randomNumber(3));
        $reportPage = new Prototype\ReportPage($report);
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

    public function testSingleton()
    {
        $reportConfig = Singleton\ReportConfig::getInstanse();
        $reportConfig->setValue('test', 'value');
        $reportConfig1 = Singleton\ReportConfig::getInstanse();
        $this->assertEquals($reportConfig->getValue('test'), $reportConfig1->getValue('test'));
    }
}
