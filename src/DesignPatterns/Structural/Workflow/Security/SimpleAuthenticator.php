<?php

namespace GrowthCode\DesignPatterns\Structural\Workflow\Security;

class SimpleAuthenticator implements AuthenticatorInterface
{
    public function authenticate(bool $authenticated): bool
    {
        // Aqui você colocaria sua lógica de autenticação real
        return $authenticated;
    }
}
