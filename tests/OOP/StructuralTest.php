<?php

namespace Tests\OOP;

use PHPUnit\Framework\TestCase;
use OOP\Structural\Adapter;
use OOP\Structural\Bridge;
use OOP\Structural\Composite;
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
}
