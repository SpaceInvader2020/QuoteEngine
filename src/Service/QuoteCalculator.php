<?php

namespace App\Service;

use App\Interfaces\QuoteUseCaseInterface;

/**
 * Class QuoteCalculator
 */
class QuoteCalculator
{
    /**
     * @var float
     */
    private $basicPremium;

    /**
     * @var QuoteUseCaseInterface[]
     */
    private $useCases;

    /**
     * QuoteCalculator constructor.
     * @param float $basicPremium
     * @param array $useCases
     */
    public function __construct(float $basicPremium, array $useCases)
    {
        $this->useCases = $useCases;
        $this->basicPremium = $basicPremium;
    }

    /**
     * @return float
     */
    public function calculate(): float
    {
        $premiumTotal = $this->basicPremium;
        foreach ($this->useCases as $useCase) {
            $premiumTotal *= ($useCase->handle()->getRatingFactor() > 0 ? $useCase->handle()->getRatingFactor() : 1);
        }
        return $premiumTotal;
    }
}
