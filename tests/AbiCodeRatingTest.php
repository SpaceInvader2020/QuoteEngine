<?php

namespace App\Tests;

use App\Entity\AbiCodeRating;
use PHPUnit\Framework\TestCase;

class AbiCodeRatingTest extends TestCase
{
    /**
     * @var AbiCodeRating
     */
    private $abiCodeRating;

    public function setUp(): void
    {
        $this->abiCodeRating = new AbiCodeRating();
    }

    public function testGetAbiCode()
    {
        $this->abiCodeRating->setAbiCode("ABICODE");
        $this->assertEquals("ABICODE",$this->abiCodeRating->getAbiCode());
    }

    public function testGetRatingFactor()
    {
        $this->abiCodeRating->setRatingFactor(2.4);
        $this->assertEquals(2.4,$this->abiCodeRating->getRatingFactor());
    }
}
