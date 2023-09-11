<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Context;

final class RecentActivities
{
    private $activities;

    public function __construct(array $activities)
    {
        $this->activities = $activities;
    }

    public function getActivities(string $activity): array
    {
        return $this->activities[$activity];
    }
}
