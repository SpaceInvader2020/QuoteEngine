<?php


namespace App\Interfaces;


/**
 * Interface QuoteUseCase
 * @package App\Interfaces
 */
interface QuoteUseCase
{
    /**
     * @return RatingFactorInterface|null
     */
    public function handle(): ?RatingFactorInterface;
}