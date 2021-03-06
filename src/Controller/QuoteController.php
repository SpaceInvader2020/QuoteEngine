<?php

namespace App\Controller;

use App\Service\QuoteCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class QuoteController
 * @package App\Controller
 */
class QuoteController extends AbstractController
{

    /**
     * @Route("/", name="quote", methods={"POST"})
     *
     * @param QuoteCalculator $quoteCalculator
     * @return JsonResponse
     */
    public function index(QuoteCalculator $quoteCalculator)
    {
        try {
            $data = [
                'quote' => $quoteCalculator->calculate()
            ];

            return new JsonResponse($data, 200);
        } catch (\Exception $e) {
            $data = [
                'errors' => "Data is not valid",
            ];
            return new JsonResponse($data, 422);
        }
    }
}
