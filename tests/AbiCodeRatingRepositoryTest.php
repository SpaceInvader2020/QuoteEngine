<?php

namespace App\Tests;

use App\Entity\AbiCodeRating;
use App\Repository\AbiCodeRatingRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AbiCodeRatingRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testFindByAbiCode()
    {
        /**
         * @var $abiCodeRatingRepository AbiCodeRatingRepository
         */
        $abiCodeRatingRepository = $this->entityManager->getRepository(AbiCodeRating::class);
        /**
         * @var $abiCodeRating AbiCodeRating|null
         */
        $abiCodeRating = $abiCodeRatingRepository->findByAbiCode('46545255');
        $this->assertSame(1.15, $abiCodeRating->getRatingFactor());

    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }

}
