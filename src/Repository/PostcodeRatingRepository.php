<?php

namespace App\Repository;

use App\Entity\PostcodeRating;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PostcodeRating|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostcodeRating|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostcodeRating[]    findAll()
 * @method PostcodeRating[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostcodeRatingRepository extends ServiceEntityRepository
{
    /**
     * PostcodeRatingRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostcodeRating::class);
    }

    /**
     * @return PostcodeRating Returns PostcodeRating objects based on area
     */
    public function findByPostcodeArea($area): ?PostcodeRating
    {
        return $this->findOneBy(["postcodeArea" => $area]);
    }
}
