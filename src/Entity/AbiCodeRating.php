<?php

namespace App\Entity;

use App\Repository\AbiCodeRatingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AbiCodeRatingRepository::class)
 */
class AbiCodeRating implements RatingFactorInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=10)
     */
    private $abiCode;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $ratingFactor;


    public function getAbiCode(): ?string
    {
        return $this->abiCode;
    }

    public function setAbiCode(string $abiCode): self
    {
        $this->abiCode = $abiCode;

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
