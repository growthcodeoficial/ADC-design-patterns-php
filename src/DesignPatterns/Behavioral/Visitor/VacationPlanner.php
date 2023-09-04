<?php

namespace GrowthCode\DesignPatterns\Behavioral\Visitor;

use SplObjectStorage;

// Client
class VacationPlanner
{
    private SplObjectStorage $touristAttractions;

    public function __construct()
    {
        $this->touristAttractions = new SplObjectStorage();
    }

    public function addAttraction(TouristAttraction $attraction): void
    {
        $this->touristAttractions->attach($attraction);
    }

    public function removeAttraction(TouristAttraction $attraction): void
    {
        $this->touristAttractions->detach($attraction);
    }

    public function arrangeTour(Tourist $tourist): void
    {
        foreach ($this->touristAttractions as $attraction) {
            $attraction->accept($tourist);
        }
    }
}
