<?php

namespace GrowthCode\Tests\DesignPatterns\Advanced\SmartHomeExample;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Advanced\SmartHomeExample\EventManager;
use GrowthCode\DesignPatterns\Advanced\SmartHomeExample\LightDevice;
use GrowthCode\DesignPatterns\Advanced\SmartHomeExample\ThermostatDevice;
use GrowthCode\DesignPatterns\Advanced\SmartHomeExample\VacationModeListener;
use GrowthCode\DesignPatterns\Advanced\SmartHomeExample\Event;

final class SmartHomeTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        EventManager::getInstance()->reset();
    }

    public function testLightDeviceInVacationMode(): void
    {
        $eventManager = EventManager::getInstance();
        $lightDevice = new LightDevice();

        $lightListener = new VacationModeListener($lightDevice);
        $eventManager->addListener('vacationMode', $lightListener);

        // Trigger event
        $eventManager->trigger(new Event('vacationMode'));
        $this->assertEquals(1, $lightDevice->getStatus());

        // Undo modification
        $lightListener->undo();
        $this->assertEquals(0, $lightDevice->getStatus());
    }

    public function testThermostatDeviceInVacationMode(): void
    {
        $eventManager = EventManager::getInstance();
        $thermostatDevice = new ThermostatDevice();

        $thermostatListener = new VacationModeListener($thermostatDevice);
        $eventManager->addListener('vacationMode', $thermostatListener);

        // Trigger event
        $eventManager->trigger(new Event('vacationMode'));
        $this->assertEquals(2, $thermostatDevice->getStatus());

        // Undo modification
        $thermostatListener->undo();
        $this->assertEquals(0, $thermostatDevice->getStatus());
    }

    public function testMultipleDevicesInVacationMode(): void
    {
        $eventManager = EventManager::getInstance();
        $lightDevice = new LightDevice();
        $thermostatDevice = new ThermostatDevice();

        $lightListener = new VacationModeListener($lightDevice);
        $thermostatListener = new VacationModeListener($thermostatDevice);

        $eventManager->addListener('vacationMode', $lightListener);
        $eventManager->addListener('vacationMode', $thermostatListener);

        // Trigger event
        $eventManager->trigger(new Event('vacationMode'));
        $this->assertEquals(1, $lightDevice->getStatus());
        $this->assertEquals(2, $thermostatDevice->getStatus());

        // Undo modification
        $lightListener->undo();
        $thermostatListener->undo();
        $this->assertEquals(0, $lightDevice->getStatus());
        $this->assertEquals(0, $thermostatDevice->getStatus());
    }

    public function testUndoStackFunctionality(): void
    {
        $eventManager = EventManager::getInstance();
        $lightDevice = new LightDevice();

        $lightListener = new VacationModeListener($lightDevice);
        $eventManager->addListener('vacationMode', $lightListener);

        // Trigger event twice
        $eventManager->trigger(new Event('vacationMode'));
        $this->assertEquals(1, $lightDevice->getStatus()); // Status should still be 1 (toggle)

        // Undo modification twice
        $lightListener->undo();
        $lightListener->undo();
        $this->assertEquals(0, $lightDevice->getStatus());
    }
}
