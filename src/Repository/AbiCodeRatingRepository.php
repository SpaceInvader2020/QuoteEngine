<?php

namespace App\Repository;

use App\Entity\AbiCodeRating;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AbiCodeRating|null find($id, $lockMode = null, $lockVersion = null)
 * @method AbiCodeRating|null findOneBy(array $criteria, array $orderBy = null)
 * @method AbiCodeRating[]    findAll()
 * @method AbiCodeRating[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AbiCodeRatingRepository extends ServiceEntityRepository
{
    /**
     * AbiCodeRatingRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AbiCodeRating::class);
    }

    /**
     * @param $abiCode
     * @return AbiCodeRating|null
     */
    public function findByAbiCode($abiCode): ?AbiCodeRating
    {
        return $this->findOneBy(["abiCode" => $abiCode]);
    }
}
