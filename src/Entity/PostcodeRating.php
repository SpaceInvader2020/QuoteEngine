<?php

namespace App\Entity;

use App\Repository\PostcodeRatingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostcodeRatingRepository::class)
 */
class PostcodeRating implements RatingFactorInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=4)
     */
    private $postcodeArea;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $ratingFactor;

    public function getPostcodeArea(): ?string
    {
        return $this->postcodeArea;
    }

    public function setPostcodeArea(string $postcodeArea): self
    {
        $this->postcodeArea = $postcodeArea;

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
