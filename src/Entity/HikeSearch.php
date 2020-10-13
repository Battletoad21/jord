<?php

namespace App\Entity;

class HikeSearch 
{

    /**
     * @var string|null
     */
    private $difficulty;

    /**
     * @var string|null
     */
    private $postalCode;

    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    public function setDifficulty(?string $difficulty): HikeSearch
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getpostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setpostalCode(?string $postalCode): HikeSearch
    {
        $this->postalCode = $postalCode;

        return $this;
    }

}