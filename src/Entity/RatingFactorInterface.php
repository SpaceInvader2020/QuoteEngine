<?php


namespace App\Entity;


interface RatingFactorInterface
{
    /**
     * @return float|null
     */
    public function getRatingFactor(): ?float;
}