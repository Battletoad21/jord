<?php

namespace App\Entity;

use App\Repository\HikeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass=HikeRepository::class)
 * @UniqueEntity("title")
 */
class Hike
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $time;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $distance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\PositiveOrZero
     */
    private $positive_climb;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NegativeOrZero
     */
    private $negative_climb;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Choice({"Facile", "Moyenne", "Difficile"})
     */
    private $difficulty;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $postal_code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $start_lat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $start_lng;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(?string $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getDistance(): ?float
    {
        return $this->distance;
    }

    public function setDistance(?float $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getPositiveClimb(): ?int
    {
        return $this->positive_climb;
    }

    public function setPositiveClimb(?int $positive_climb): self
    {
        $this->positive_climb = $positive_climb;

        return $this;
    }

    public function getNegativeClimb(): ?int
    {
        return $this->negative_climb;
    }

    public function setNegativeClimb(?int $negative_climb): self
    {
        $this->negative_climb = $negative_climb;

        return $this;
    }

    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    public function setDifficulty(?string $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(?string $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getStartLat(): ?string
    {
        return $this->start_lat;
    }

    public function setStartLat(?string $start_lat): self
    {
        $this->start_lat = $start_lat;

        return $this;
    }

    public function getStartLng(): ?string
    {
        return $this->start_lng;
    }

    public function setStartLng(?string $start_lng): self
    {
        $this->start_lng = $start_lng;

        return $this;
    }
}
