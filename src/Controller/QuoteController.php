<?php

namespace App\Controller;

use App\Service\QuoteCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class QuoteController
 * @package App\Controller
 */
class QuoteController extends AbstractController
{

    /**
     * @Route("/", name="quote")
     *
     * @param Request $request
     * @param QuoteCalculator $quoteCalculator
     * @return JsonResponse
     */
    public function index(Request $request, QuoteCalculator $quoteCalculator)
    {
        try {
            if (!$request) {
                throw new \Exception();
            }

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
