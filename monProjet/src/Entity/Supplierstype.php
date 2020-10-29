<?php

namespace App\Entity;

use App\Repository\SupplierstypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SupplierstypeRepository::class)
 */
class Supplierstype
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $supplierstype_name;

    /**
     * @ORM\OneToMany(targetEntity=Suppliers::class, mappedBy="supplierstype_id")
     */
    private $suppliers;

    public function __construct()
    {
        $this->suppliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSupplierstypeName(): ?string
    {
        return $this->supplierstype_name;
    }

    public function setSupplierstypeName(string $supplierstype_name): self
    {
        $this->supplierstype_name = $supplierstype_name;

        return $this;
    }

    /**
     * @return Collection|Suppliers[]
     */
    public function getSuppliers(): Collection
    {
        return $this->suppliers;
    }

    public function addSupplier(Suppliers $supplier): self
    {
        if (!$this->suppliers->contains($supplier)) {
            $this->suppliers[] = $supplier;
            $supplier->setSupplierstypeId($this);
        }

        return $this;
    }

    public function removeSupplier(Suppliers $supplier): self
    {
        if ($this->suppliers->removeElement($supplier)) {
            // set the owning side to null (unless already changed)
            if ($supplier->getSupplierstypeId() === $this) {
                $supplier->setSupplierstypeId(null);
            }
        }

        return $this;
    }
}
