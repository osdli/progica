<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Departments
 *
 * @ORM\Table(
 *     name="departments",
 *     indexes={
 *     @ORM\Index(name="departments_code_index", columns={"code"}),
 *     @ORM\Index(name="departments_region_code_foreign", columns={"region_code"})
 * })
 * @ORM\Entity(repositoryClass="App\Repository\DepartmentsRepository")
 */
class Departments
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var string
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
     * @ORM\OneToMany(targetEntity=Lodge::class, mappedBy="departements", orphanRemoval=true)
     */
    private $lodge;



    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var Regions
     *
     * @ORM\ManyToOne(targetEntity="Regions")
     * @ORM\JoinColumn(name="region_code", referencedColumnName="code")
     */


    private $regionCode;

  /*  /**
     * @var Cities
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Cities")
     * @ORM\JoinColumn(name="region_code", referencedColumnName="code" )
     */


    private $cities;


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

    public function getRegionCode(): ?Regions
    {
        return $this->regionCode;
    }

    public function setRegionCode(?Regions $regionCode): self
    {
        $this->regionCode = $regionCode;

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
