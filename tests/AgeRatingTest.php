<?php

namespace App\Tests;

use App\Entity\AgeRating;
use PHPUnit\Framework\TestCase;

class AgeRatingTest extends TestCase
{
    /**
     * @var AgeRating
     */
    private $ageRating;

    public function setUp(): void
    {
        $this->ageRating = new AgeRating();
    }

    public function testGetAge()
    {
        $this->ageRating->setAge(10);
        $this->assertEquals(10, $this->ageRating->getAge());
    }

    public function testRatingFactor()
    {
        $this->ageRating->setRatingFactor(0.5);
        $this->assertEquals(0.5, $this->ageRating->getRatingFactor());
    }
}
