<?php
namespace App\Service;
use App\Entity\RatingFactorInterface;

/**
 * Class QuoteCalculator
 */
class QuoteCalculator
{
    /**
     * @param array $ratingFactors
     * @return float
     */
    public static function calculate(array $ratingFactors): float
    {
        $premiumTotal = 500;
        foreach ($ratingFactors as $ratingFactor){
            $premiumTotal = $premiumTotal * ($ratingFactor instanceof RatingFactorInterface ? $ratingFactor->getRatingFactor() : 1);
        }
        return $premiumTotal ;
    }

}