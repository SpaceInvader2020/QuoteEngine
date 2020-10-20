<?php

namespace App\Entity;

use App\Repository\AgeRatingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgeRatingRepository::class)
 */
class AgeRating implements RatingFactorInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $ratingFactor;


    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getRatingFactor(): ?float
    {
        return $this->ratingFactor;
    }

    public function setRatingFactor(?float $ratingFactor): self
    {
        $this->ratingFactor = $ratingFactor;

        return $this;
    }
}
