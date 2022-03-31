<?php

namespace App\Entity;

use App\Repository\LodgeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LodgeRepository::class)
 */
class Lodge
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
     * @ORM\Column(type="string", length=500)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\Column(type="boolean")
     */
    private $animal;

    /**
     * @ORM\Column(type="float")
     */
    private $animal_cost;

    /**
     * @ORM\Column(type="float")
     */
    private $high_season_price;

    /**
     * @ORM\Column(type="float")
     */
    private $low_season_price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="integer")
     */
    private $area;

    /**
     * @ORM\Column(type="integer")
     */
    private $bed;

    /**
     * @ORM\Column(type="integer")
     */
    private $bedroom;

    /**
     * @ORM\OneToMany(targetEntity=Contact::class, mappedBy="lodge")
     */
    private $contact;

    /**
     * @ORM\ManyToOne(targetEntity=Regions::class, inversedBy="lodge")
     * @ORM\JoinColumn(nullable=false)
     */
    private $regions;

    /**
     * @ORM\ManyToOne(targetEntity=Departments::class, inversedBy="lodge")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departements;

    /**
     * @ORM\ManyToOne(targetEntity=Cities::class, inversedBy="lodge")
     */
    private $cities;

    public function __construct()
    {
        $this->contact = new ArrayCollection();
    }

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

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getAnimal(): ?bool
    {
        return $this->animal;
    }

    public function setAnimal(bool $animal): self
    {
        $this->animal = $animal;

        return $this;
    }

    public function getAnimalCost(): ?float
    {
        return $this->animal_cost;
    }

    public function setAnimalCost(float $animal_cost): self
    {
        $this->animal_cost = $animal_cost;

        return $this;
    }

    public function getHighSeasonPrice(): ?float
    {
        return $this->high_season_price;
    }

    public function setHighSeasonPrice(float $high_season_price): self
    {
        $this->high_season_price = $high_season_price;

        return $this;
    }

    public function getLowSeasonPrice(): ?float
    {
        return $this->low_season_price;
    }

    public function setLowSeasonPrice(float $low_season_price): self
    {
        $this->low_season_price = $low_season_price;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getArea(): ?int
    {
        return $this->area;
    }

    public function setArea(int $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getBed(): ?int
    {
        return $this->bed;
    }

    public function setBed(int $bed): self
    {
        $this->bed = $bed;

        return $this;
    }

    public function getBedroom(): ?int
    {
        return $this->bedroom;
    }

    public function setBedroom(int $bedroom): self
    {
        $this->bedroom = $bedroom;

        return $this;
    }

    /**
     * @return Collection<int, contact>
     */
    public function getContact(): Collection
    {
        return $this->contact;
    }

    public function addContact(contact $contact): self
    {
        if (!$this->contact->contains($contact)) {
            $this->contact[] = $contact;
            $contact->setLodge($this);
        }

        return $this;
    }

    public function removeContact(contact $contact): self
    {
        if ($this->contact->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getLodge() === $this) {
                $contact->setLodge(null);
            }
        }

        return $this;
    }

    public function getRegions(): ?Regions
    {
        return $this->regions;
    }

    public function setRegions(?Regions $regions): self
    {
        $this->regions = $regions;

        return $this;
    }

    public function getDepartements(): ?Departements
    {
        return $this->departements;
    }

    public function setDepartements(?Departements $departements): self
    {
        $this->departements = $departements;

        return $this;
    }

    public function getCities(): ?Cities
    {
        return $this->cities;
    }

    public function setCities(?Cities $cities): self
    {
        $this->cities = $cities;

        return $this;
    }
}
