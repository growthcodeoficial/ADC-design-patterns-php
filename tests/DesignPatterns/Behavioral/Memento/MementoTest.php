<?php

namespace GrowthCode\Tests\DesignPatterns\Behavioral\Memento;

use PHPUnit\Framework\TestCase;
use GrowthCode\DesignPatterns\Behavioral\Memento\Person;
use GrowthCode\DesignPatterns\Behavioral\Memento\Librarian;

final class MementoTest extends TestCase
{
    public function testMementoPattern()
    {
        // Initialize the Originator (Person) and Caretaker (Librarian)
        $person = new Person();
        $librarian = new Librarian();

        // Set initial state and save it
        $person->setState("State 1");
        $librarian->addMemoryCapsule($person->saveToMemoryCapsule());

        // Assert initial state without popping it
        $initialState = $librarian->getMemoryCapsule();
        $this->assertEquals("State 1", $initialState->getState());
        $librarian->addMemoryCapsule($initialState);  // Put it back into the stack

        // Change state and save it
        $person->setState("State 2");
        $librarian->addMemoryCapsule($person->saveToMemoryCapsule());

        // Assert new state without popping it
        $newState = $librarian->getMemoryCapsule();
        $this->assertEquals("State 2", $newState->getState());
        $librarian->addMemoryCapsule($newState);  // Put it back into the stack

        // Restore previous state
        $librarian->getMemoryCapsule();  // Remove the latest state (State 2)
        $restoredMemoryCapsule = $librarian->getMemoryCapsule();  // Now get the initial state (State 1)
        if ($restoredMemoryCapsule !== null) {
            $person->restoreFromMemoryCapsule($restoredMemoryCapsule);
        }

        // Assert restored state
        $this->assertEquals("State 1", $person->saveToMemoryCapsule()->getState());
    }
}
