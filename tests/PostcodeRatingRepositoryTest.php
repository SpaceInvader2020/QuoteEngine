<?php

namespace App\Tests;

use App\Entity\PostcodeRating;
use App\Repository\PostcodeRatingRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PostcodeRatingRepositoryTest extends KernelTestCase
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
         * @var $postcodeRatingRepository PostcodeRatingRepository
         */
        $postcodeRatingRepository = $this->entityManager->getRepository(PostcodeRating::class);
        /**
         * @var $postcodeRating PostcodeRating|null
         */
        $postcodeRating = $postcodeRatingRepository->findByPostcodeArea('LE10');
        $this->assertSame(1.35, $postcodeRating->getRatingFactor());

    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
