<?php

namespace Tests\OOP;

use PHPUnit\Framework\TestCase;
use OOP\Behavioral\ChainOfResponsibility;
use OOP\Behavioral\Command;
use OOP\Behavioral\Iterator;
use OOP\Behavioral\Mediator;
use OOP\Behavioral\Memento;
use OOP\Behavioral\Observer;
use OOP\Behavioral\State;
use OOP\Behavioral\Strategy;
use OOP\Behavioral\TemplateMethod;
use OOP\Behavioral\Visitor;
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

    public function testMediator()
    {
        $key = $this->faker->randomNumber(3);
        $reportMediator = new Mediator\ReportMediator();
        $reportMediator->setHeader(new Mediator\Header());
        $reportMediator->setContent(new Mediator\Content());
        $reportMediator->setFooter(new Mediator\Footer());
        $reportMediator->setReport(new Mediator\Report());
        $reportMediator->generateReport($key);

        $this->assertStringContainsString(
            'Content for report '.$key,
            $reportMediator->getReport()
        );
    }

    public function testMemento()
    {
        $key = $this->faker->randomNumber(3);
        $report = new Memento\Report();
        $reportCaretaker = new Memento\ReportCaretaker($report);
        $report->generate($key);
        $reportCaretaker->backup();

        $newKey = $this->faker->randomNumber(3);
        $report->generate($newKey);

        $this->assertStringContainsString(
            'Content for key '.$newKey,
            $report->getReport()
        );

        $reportCaretaker->undo();

        $this->assertStringContainsString(
            'Content for key '.$key,
            $report->getReport()
        );
    }

    public function testObserver()
    {
        $key = $this->faker->randomNumber(3);
        $report = new Observer\Report();

        $header = new Observer\Header();
        $content = new Observer\Content();
        $footer = new Observer\Footer();

        $report->attach($header);
        $report->attach($content);
        $report->attach($footer);

        $report->setKey($key);

        $this->assertStringContainsString(
            'Content for report key '.$key,
            $content->getContent()
        );
    }

    public function testState()
    {
        $key = $this->faker->randomNumber(3);
        $report = new State\Report(new State\InitialState());
        $this->assertFalse($report->generateReport());
        $this->assertEmpty($report->getContent());

        $report->setKey($key);
        $this->assertTrue($report->generateReport());

        $this->assertStringContainsString(
            'Content for key '.$key,
            $report->getContent()
        );
    }

    public function testStrategy()
    {
        $key = $this->faker->randomNumber(3);
        $report = new Strategy\Report(new Strategy\SimpleReport());

        $this->assertStringContainsString(
            'Simple report content for key '.$key,
            $report->getContent($key)
        );

        $report->setStrategy(new Strategy\FullReport());

        $this->assertStringContainsString(
            'Full report content for key '.$key,
            $report->getContent($key)
        );
    }

    public function testTemplateMethod()
    {
        $key = $this->faker->randomNumber(3);
        $report = new TemplateMethod\SimpleReport($key);
        $report->generate();

        $this->assertStringContainsString(
            'Simple report content for key '.$key,
            $report->getReport()
        );

        $report = new TemplateMethod\FullReport($key);
        $report->generate();

        $this->assertStringContainsString(
            'Full report content for key '.$key,
            $report->getReport()
        );
    }

    public function testVisitor()
    {
        $key = $this->faker->randomNumber(3);
        $header = new Visitor\Header();
        $content = new Visitor\Content();
        $report = new Visitor\Report($key, $header, $content);

        $htmlVisitor = new Visitor\HTMLVisitor();
        $pdfVisitor = new Visitor\PDFVisitor();

        $report->accept($htmlVisitor);
        $this->assertStringContainsString(
            'HTML main content for key '.$key,
            $report->getContent()
        );

        $report->accept($pdfVisitor);
        $this->assertStringContainsString(
            'PDF main content for key '.$key,
            $report->getContent()
        );
    }
}
