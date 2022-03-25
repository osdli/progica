<?php

namespace App\Entity;

use App\Repository\LodgeOptionPriceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LodgeOptionPriceRepository::class)
 */
class LodgeOptionPrice
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=lodge::class)
     */
    private $lodge;

    /**
     * @ORM\ManyToOne(targetEntity=option::class)
     */
    private $options;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLodge(): ?lodge
    {
        return $this->lodge;
    }

    public function setLodge(?lodge $lodge): self
    {
        $this->lodge = $lodge;

        return $this;
    }

    public function getOptions(): ?option
    {
        return $this->options;
    }

    public function setOptions(?option $options): self
    {
        $this->options = $options;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }
}
