<?php

namespace GrowthCode\DesignPatterns\Behavioral\Mediator;

use SplObjectStorage;

class UnitedNations implements Mediator
{
    private SplObjectStorage $countries;

    public function __construct()
    {
        $this->countries = new SplObjectStorage();
    }

    public function addCountry(Country $country): void
    {
        $this->countries->attach($country);
    }

    public function send(string $message, Country $country): void
    {
        foreach ($this->countries as $aCountry) {
            if ($aCountry !== $country) {
                $aCountry->receive($message);
            }
        }
    }
}
