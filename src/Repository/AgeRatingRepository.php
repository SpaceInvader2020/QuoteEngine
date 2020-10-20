<?php

namespace App\Repository;

use App\Entity\AgeRating;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AgeRating|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgeRating|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgeRating[]    findAll()
 * @method AgeRating[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgeRatingRepository extends ServiceEntityRepository
{
    /**
     * AgeRatingRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgeRating::class);
    }
    /**
     * @param integer $age
     * @return AgeRating|null
     */
    public function findByAge(int $age): ?AgeRating
    {
        return $this->findOneBy(["age" => $age]);
    }
}
