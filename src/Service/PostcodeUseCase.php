<?php

namespace App\Service;

use App\Interfaces\QuoteUseCaseInterface;
use App\Interfaces\RatingFactorInterface;
use App\Repository\PostcodeRatingRepository;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class PostcodeUseCase
 * @package App\Service
 */
class PostcodeUseCase implements QuoteUseCaseInterface
{
    /**
     * @var PostcodeRatingRepository
     */
    private $postcodeRatingRepository;
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * PostcodeUseCase constructor.
     * @param PostcodeRatingRepository $postcodeRatingRepository
     * @param RequestStack $requestStack
     */
    public function __construct(PostcodeRatingRepository $postcodeRatingRepository, RequestStack $requestStack)
    {
        $this->postcodeRatingRepository = $postcodeRatingRepository;
        $this->requestStack = $requestStack;
    }

    /**
     * @return RatingFactorInterface|null
     */
    public function handle(): ?RatingFactorInterface
    {
        $postcode = $this->requestStack->getCurrentRequest()->get('postcode');
        $area = substr($postcode, 0, 3);
        return isset($area) ? $this->postcodeRatingRepository->findByPostcodeArea($area) : null;
    }
}
