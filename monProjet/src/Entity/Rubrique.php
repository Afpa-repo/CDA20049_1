<?php

namespace App\Entity;

use App\Repository\RubriqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RubriqueRepository::class)
 */
class Rubrique
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $rubrique_name;

    /**
     * @ORM\ManyToOne(targetEntity=Rubrique::class)
     */
    private $rubrique_sous;

    /**
     * @ORM\OneToMany(targetEntity=Products::class, mappedBy="rubrique_id", orphanRemoval=true)
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRubriqueName(): ?string
    {
        return $this->rubrique_name;
    }

    public function setRubriqueName(?string $rubrique_name): self
    {
        $this->rubrique_name = $rubrique_name;

        return $this;
    }

    public function getRubriqueSous(): ?self
    {
        return $this->rubrique_sous;
    }

    public function setRubriqueSous(?self $rubrique_sous): self
    {
        $this->rubrique_sous = $rubrique_sous;

        return $this;
    }

    /**
     * @return Collection|Products[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Products $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setRubriqueId($this);
        }

        return $this;
    }

    public function removeProduct(Products $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getRubriqueId() === $this) {
                $product->setRubriqueId(null);
            }
        }

        return $this;
    }
}
