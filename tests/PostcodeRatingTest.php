<?php

namespace App\Tests;

use App\Entity\PostcodeRating;
use PHPUnit\Framework\TestCase;

class PostcodeRatingTest extends TestCase
{
    /**
     * @var PostcodeRating
     */
    private $postcodeRating;

    public function setUp(): void
    {
        $this->postcodeRating = new PostcodeRating();
    }

    public function testGetPostcodeArea()
    {
        $this->postcodeRating->setPostcodeArea('HU3');
        $this->assertEquals('HU3', $this->postcodeRating->getPostcodeArea());
    }

    public function testGetRatingFactor()
    {
        $this->postcodeRating->setRatingFactor(0.6);
        $this->assertEquals(0.6, $this->postcodeRating->getRatingFactor());
    }
}
