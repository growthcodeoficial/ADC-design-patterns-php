<?php

namespace GrowthCode\DesignPatterns\Advanced\LogSystemExample;

/**
 * Concrete Observer for email notifications.
 */
class EmailNotifier implements LogObserver
{
    public function notify(string $message): void
    {
        // Simulate sending an email
        echo "Email sent with log message: $message\n";
    }
}
