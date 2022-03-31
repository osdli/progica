<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Regions
 *
 * @ORM\Table(name="regions", uniqueConstraints={@ORM\UniqueConstraint(name="regions_code_unique", columns={"code"})})
 * @ORM\Entity(repositoryClass="App\Repository\RegionsRepository")
 */
class Regions
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     *
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="code", type="string", length=3, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=Lodge::class, mappedBy="regions", orphanRemoval=true)
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
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
            $lodge->setRegions($this);
        }

        return $this;
    }

    public function removeLodge(Lodge $lodge): self
    {
        if ($this->lodge->removeElement($lodge)) {
            // set the owning side to null (unless already changed)
            if ($lodge->getRegions() === $this) {
                $lodge->setRegions(null);
            }
        }

        return $this;
    }


}
