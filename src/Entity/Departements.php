<?php

namespace App\Entity;

use App\Repository\DepartementsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartementsRepository::class)
 */
class Departements
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Lodge::class, mappedBy="departements", orphanRemoval=true)
     */
    private $lodge;

    public function __construct()
    {
        $this->lodge = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Lodge>
     */
    public function getLodge(): Collection
    {
        return $this->lodge;
    }

    public function addLodge(Lodge $lodge): self
    {
        if (!$this->lodge->contains($lodge)) {
            $this->lodge[] = $lodge;
            $lodge->setDepartements($this);
        }

        return $this;
    }

    public function removeLodge(Lodge $lodge): self
    {
        if ($this->lodge->removeElement($lodge)) {
            // set the owning side to null (unless already changed)
            if ($lodge->getDepartements() === $this) {
                $lodge->setDepartements(null);
            }
        }

        return $this;
    }
}
