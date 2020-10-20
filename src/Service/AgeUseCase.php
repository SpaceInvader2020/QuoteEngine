<?php

namespace App\Service;

use App\Interfaces\QuoteUseCase;
use App\Interfaces\RatingFactorInterface;
use App\Repository\AgeRatingRepository;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class AgeUseCase
 * @package App\Service
 */
class AgeUseCase implements QuoteUseCase
{
    /**
     * @var AgeRatingRepository
     */
    private $ageRatingRepository;
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * AgeUseCase constructor.
     * @param AgeRatingRepository $ageRatingRepository
     * @param RequestStack $requestStack
     */
    public function __construct(AgeRatingRepository $ageRatingRepository, RequestStack $requestStack)
    {
        $this->ageRatingRepository = $ageRatingRepository;
        $this->requestStack = $requestStack;
    }

    /**
     * @return RatingFactorInterface|null
     */
    public function handle(): ?RatingFactorInterface
    {
        $age = $this->requestStack->getCurrentRequest()->get('age');
        return $this->ageRatingRepository->findByAge($age);
    }

}