<?php

namespace Spatie\Image\Test;

use PHPUnit_Framework_TestCase;
use Spatie\Image\Manipulations;

class ManipulationsTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_can_be_serialized()
    {
        $manipulations = (new Manipulations())
            ->width(100)
            ->height(100)
            ->apply()
            ->pixelate(50)
            ->blur(10);

        $unserializedManipulations = unserialize(serialize($manipulations));

        $this->assertEquals(
            $manipulations->getManipulationSequence()->toArray(),
            $unserializedManipulations->getManipulationSequence()->toArray()
        );
    }
}
