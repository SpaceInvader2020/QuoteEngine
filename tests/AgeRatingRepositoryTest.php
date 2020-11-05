<?php

namespace App\Tests;

use App\Entity\AgeRating;
use App\Repository\AgeRatingRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AgeRatingRepositoryTest extends KernelTestCase
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

    public function testFindByAge()
    {
        /**
         * @var $ageRatingRepository AgeRatingRepository
         */
        $ageRatingRepository = $this->entityManager->getRepository(AgeRating::class);
        /**
         * @var $ageRating AgeRating|null
         */
        $ageRating = $ageRatingRepository->findByAge('20');
        $this->assertSame(1.20, $ageRating->getRatingFactor());

    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
