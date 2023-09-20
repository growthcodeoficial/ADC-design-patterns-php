<?php

namespace GrowthCode\DesignPatterns\Structural\Workflow\Security;

interface AuthenticatorInterface
{
    public function authenticate(bool $authenticated): bool;
}
