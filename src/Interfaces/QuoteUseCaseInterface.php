<?php

namespace App\Interfaces;

/**
 * Interface QuoteUseCaseInterface
 * @package App\Interfaces
 */
interface QuoteUseCaseInterface
{
    /**
     * @return RatingFactorInterface|null
     */
    public function handle(): ?RatingFactorInterface;
}
