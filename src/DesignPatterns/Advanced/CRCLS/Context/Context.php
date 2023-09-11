<?php

namespace GrowthCode\DesignPatterns\Advanced\CRCLS\Context;

use GrowthCode\DesignPatterns\Advanced\CRCLS\User\User;

class Context
{
    private User $user;
    private RecentActivities $recentActivities;
    private AdditionalFactors $additionalFactors;

    public function __construct(User $user, RecentActivities $recentActivities, AdditionalFactors $additionalFactors)
    {
        $this->user = $user;
        $this->recentActivities = $recentActivities;
        $this->additionalFactors = $additionalFactors;
    }

    
    public function getUser(): User
    {
        return $this->user;
    }

    public function getRecentActivities(): RecentActivities
    {
        return $this->recentActivities;
    }

    public function getAdditionalFactors(): AdditionalFactors
    {
        return $this->additionalFactors;
    }
}
