<?php

namespace App\Controller;

use App\Repository\AbiCodeRatingRepository;
use App\Repository\AgeRatingRepository;
use App\Repository\PostcodeRatingRepository;
use App\Service\AbiCodeLookup;
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
     * @param AbiCodeRatingRepository $abiCodeRatingRepository
     * @param AgeRatingRepository $ageRatingRepository
     * @param PostcodeRatingRepository $postcodeRatingRepository
     * @return JsonResponse
     */
    public function index(Request $request, AbiCodeRatingRepository $abiCodeRatingRepository, AgeRatingRepository $ageRatingRepository, PostcodeRatingRepository $postcodeRatingRepository)
    {
        try{

            /**
             * Quoting engine could be used with a different set of rating factors!
             * Meaning age, postcode and regNo maybe not be required, some other rating factors might be introduced
             * How to make controller to accept rating factors dynamically?
             */
            if (!$request || !$request->get('age') || !$request->request->get('postcode') || !$request->get('regNo')){
                throw new \Exception();
            }

            /**
             * call to a third party API to look up the vehicle registration number and return an ABI code
             * this is only required if AbiRating is used with the quoting engine
             */
            $abiCode          = AbiCodeLookup::getAbiCode($request->get('regNo'));
            /**
             * $abiCode is only required if postcodeRating is used by quoting engine
             */
            $ratingFactors[]  = $abiCodeRatingRepository->findOneBy(["abiCode"=>$abiCode]);
            $ratingFactors[]  = $ageRatingRepository->findOneBy(["age"=>$request->get("age")]);
            /**
             * $area is only required if postcodeRating is used by quoting engine
             */
            $area             = substr($request->get("postcode"),0,3);
            $ratingFactors[]  = $postcodeRatingRepository->findByPostcodeArea($area);
            $premiumTotal     = QuoteCalculator::calculate($ratingFactors);

            $data = [
                'status' => 200,
                'success' => "Quote created successfully",
                'quote' => $premiumTotal
            ];

            return new JsonResponse($data,200);

        }catch (\Exception $e){
            $data = [
                'status' => 422,
                'errors' => "Data is not valid",
            ];
            return new JsonResponse($data,422);
        }

    }
}
