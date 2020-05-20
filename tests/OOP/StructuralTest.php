<?php

namespace Tests\OOP;

use PHPUnit\Framework\TestCase;
use OOP\Structural\Adapter;
use OOP\Structural\Bridge;
use OOP\Structural\Composite;
use OOP\Structural\Decorator;
use OOP\Structural\Facade;
use OOP\Structural\Flyweight;
use Faker;

final class StructuralTest extends TestCase
{
    protected $faker;

    protected function setUp(): void
    {
        $this->faker = Faker\Factory::create();
    }

    public function testAdapter()
    {
        $fileSender = new Adapter\FileSender();
        $cloudLibrary = new Adapter\CloudLibrary();
        $cloudAdapter = new Adapter\CloudLibraryToSenderAdapter($cloudLibrary);

        $report = new Adapter\Report($fileSender);
        $this->assertTrue($report->createReport($this->faker->randomNumber(3))->send());

        $report->setSender($cloudAdapter);
        $this->assertTrue($report->send());
    }

    public function testBridge()
    {
        $fileSender = new Bridge\FileSender();
        $cloudSender = new Bridge\CloudSender();

        $report = new Bridge\ReportGenerator($fileSender);
        $this->assertTrue($report->createReport($this->faker->randomNumber(3))->send());

        $report->setSender($cloudSender);
        $this->assertTrue($report->send());
    }

    public function testComposite()
    {
        $reportId = $this->faker->randomNumber(3);
        $report = new Composite\Report($reportId);
        $report->addComponent(new Composite\Header($reportId));
        $report->addComponent(new Composite\Content($reportId));
        $report->addComponent(new Composite\Footer($reportId));

        $this->assertStringContainsString(
            'This is a content for report '.$reportId,
            $report->render()
        );
    }

    public function testDecorator()
    {
        $report = new Decorator\HeaderDecorator(new Decorator\FooterDecorator(new Decorator\SimpleReport()));
        $report->setHeader('test header');
        $report->setContent('test content');
        $report->setFooter('test footer');

        $this->assertStringContainsString(
            'A Company Logo!',
            $report->getReport()
        );

        $this->assertStringContainsString(
            'A Company Copyright!',
            $report->getReport()
        );
    }

    public function testFacade()
    {
        $reportId = $this->faker->randomNumber(3);
        $facade = new Facade\ReportFacade();
        $reportPage = new Facade\ReportPage($facade);

        $this->assertStringContainsString(
            'Header for '.$reportId,
            $reportPage->getPageContent($reportId)
        );

        $this->assertStringContainsString(
            'Footer for '.$reportId,
            $reportPage->getPageContent($reportId)
        );
    }

    public function testFlyweight()
    {
        $types = ['bigLogo', 'smallLogo'];
        $pageTypes = [
            'bigLogo' => 'A big logo.',
            'smallLogo' => 'A small logo.'
        ];

        $pageTypeFactory = new Flyweight\PageTypeFactory();
        // Generate some pages of different types
        for ($i=0; $i<20; $i++) {
            $type = $this->faker->randomElement($types);
            $page = new Flyweight\Page(
                'A page header '.$this->faker->sentence(),
                'A page content '.$this->faker->sentence(),
                'A page footer '.$this->faker->sentence(),
                $pageTypeFactory->getPageType($type, $pageTypes[$type])
            );
        }

        // Try to create a big logo page
        $page = new Flyweight\Page(
            'A page header '.$this->faker->sentence(),
            'A page content '.$this->faker->sentence(),
            'A page footer '.$this->faker->sentence(),
            $pageTypeFactory->getPageType('bigLogo', $pageTypes['bigLogo'])
        );

        $this->assertStringContainsString(
            'A big logo.',
            $page->render()
        );

        // Only two flyweight objects created
        $this->assertEquals(2, count($pageTypeFactory));
    }
}
