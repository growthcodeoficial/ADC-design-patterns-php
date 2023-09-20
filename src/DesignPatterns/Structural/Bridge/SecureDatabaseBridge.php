<?php

namespace GrowthCode\DesignPatterns\Structural\Bridge;

// RefinedAbstraction
class SecureDatabaseBridge extends DatabaseBridge
{
    public function executeSecureQuery(string $sql): array
    {
        // Adicione lógica de segurança aqui, por exemplo, validação, logging, ou criptografia

        // Delegar para a implementação original
        return $this->driver->query($sql);
    }
}
