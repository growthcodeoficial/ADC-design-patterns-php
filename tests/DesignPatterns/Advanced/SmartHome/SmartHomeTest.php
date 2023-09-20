<?php

namespace GrowthCode\Tests\DesignPatterns\Advanced\SmartHome;

use GrowthCode\DesignPatterns\Advanced\SmartHome\Devices\LightDevice;
use GrowthCode\DesignPatterns\Advanced\SmartHome\Devices\ThermostatDevice;
use GrowthCode\DesignPatterns\Advanced\SmartHome\Events\Event;
use GrowthCode\DesignPatterns\Advanced\SmartHome\Events\EventManager;
use GrowthCode\DesignPatterns\Advanced\SmartHome\Listeners\VacationModeListener;
use PHPUnit\Framework\TestCase;

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
