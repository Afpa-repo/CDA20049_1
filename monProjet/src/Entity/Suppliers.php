<?php

namespace App\Entity;

use App\Repository\SuppliersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuppliersRepository::class)
 */
class Suppliers
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
    private $suppliers_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $suppliers_address;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $suppliers_zipcode;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $suppliers_city;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $suppliers_phone;

    /**
     * @ORM\ManyToOne(targetEntity=Supplierstype::class, inversedBy="suppliers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $supplierstype_id;

    /**
     * @ORM\OneToMany(targetEntity=Purchases::class, mappedBy="suppliers_id", orphanRemoval=true)
     */
    private $purchases;

    public function __construct()
    {
        $this->purchases = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSuppliersName(): ?string
    {
        return $this->suppliers_name;
    }

    public function setSuppliersName(string $suppliers_name): self
    {
        $this->suppliers_name = $suppliers_name;

        return $this;
    }

    public function getSuppliersAddress(): ?string
    {
        return $this->suppliers_address;
    }

    public function setSuppliersAddress(?string $suppliers_address): self
    {
        $this->suppliers_address = $suppliers_address;

        return $this;
    }

    public function getSuppliersZipcode(): ?string
    {
        return $this->suppliers_zipcode;
    }

    public function setSuppliersZipcode(?string $suppliers_zipcode): self
    {
        $this->suppliers_zipcode = $suppliers_zipcode;

        return $this;
    }

    public function getSuppliersCity(): ?string
    {
        return $this->suppliers_city;
    }

    public function setSuppliersCity(?string $suppliers_city): self
    {
        $this->suppliers_city = $suppliers_city;

        return $this;
    }

    public function getSuppliersPhone(): ?string
    {
        return $this->suppliers_phone;
    }

    public function setSuppliersPhone(?string $suppliers_phone): self
    {
        $this->suppliers_phone = $suppliers_phone;

        return $this;
    }

    public function getSupplierstypeId(): ?Supplierstype
    {
        return $this->supplierstype_id;
    }

    public function setSupplierstypeId(?Supplierstype $supplierstype_id): self
    {
        $this->supplierstype_id = $supplierstype_id;

        return $this;
    }

    /**
     * @return Collection|Purchases[]
     */
    public function getPurchases(): Collection
    {
        return $this->purchases;
    }

    public function addPurchase(Purchases $purchase): self
    {
        if (!$this->purchases->contains($purchase)) {
            $this->purchases[] = $purchase;
            $purchase->setSuppliersId($this);
        }

        return $this;
    }

    public function removePurchase(Purchases $purchase): self
    {
        if ($this->purchases->removeElement($purchase)) {
            // set the owning side to null (unless already changed)
            if ($purchase->getSuppliersId() === $this) {
                $purchase->setSuppliersId(null);
            }
        }

        return $this;
    }
}
