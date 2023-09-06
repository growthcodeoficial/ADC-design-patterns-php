<?php

namespace GrowthCode\Tests\DesignPatterns\Advanced\LogSystemExample;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Advanced\LogSystemExample\SimpleLogStrategy;
use GrowthCode\DesignPatterns\Advanced\LogSystemExample\ConsoleLogger;
use GrowthCode\DesignPatterns\Advanced\LogSystemExample\EmailNotifier;
use GrowthCode\DesignPatterns\Advanced\LogSystemExample\LoggingSystem;

final class LogSystemTest extends TestCase
{
    public function testSimpleLogStrategyFormatsMessage(): void
    {
        $strategy = new SimpleLogStrategy();
        $this->assertEquals("[Simple] Test", $strategy->format("Test"));
    }

    public function testConsoleLoggerWritesToConsole(): void
    {
        ob_start();
        $strategy = new SimpleLogStrategy();
        $logger = new ConsoleLogger();
        $logger->setStrategy($strategy);
        $logger->log("Test");
        $output = ob_get_clean();
        $this->assertStringContainsString("Writing to console: [Simple] Test", $output);
    }

    public function testEmailNotifierSendsEmail(): void
    {
        ob_start();
        $notifier = new EmailNotifier();
        $notifier->notify("Test");
        $output = ob_get_clean();
        $this->assertStringContainsString("Email sent with log message: Test", $output);
    }

    public function testLoggingSystemLogsMessage(): void
    {
        ob_start();
        $strategy = new SimpleLogStrategy();
        $logger = new ConsoleLogger();
        $logger->setStrategy($strategy);
        $loggingSystem = new LoggingSystem($logger);
        $loggingSystem->logMessage("Test");
        $output = ob_get_clean();
        $this->assertStringContainsString("Writing to console: [Simple] Test", $output);
    }

    public function testLoggingSystemNotifiesObservers(): void
    {
        $strategy = new SimpleLogStrategy();
        $logger = new ConsoleLogger();
        $logger->setStrategy($strategy);
        $loggingSystem = new LoggingSystem($logger);

        $observer = $this->createMock(EmailNotifier::class);
        $observer->expects($this->once())
            ->method('notify')
            ->with($this->equalTo('Test'));

        $loggingSystem->addObserver($observer);
        $loggingSystem->logMessage("Test");
    }

    // ... (Continue criando mais testes para cobrir outros aspectos e cenários)
}
