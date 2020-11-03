<?php

namespace App\Entity;

use App\Repository\CategorietvaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorietvaRepository::class)
 */
class Categorietva
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2)
     */
    private $categorietva_coefficient;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $categorietva_nom;

    /**
     * @ORM\OneToMany(targetEntity=Customers::class, mappedBy="categorietva")
     */
    private $customers;

    public function __construct()
    {
        $this->customers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorietvaCoefficient(): ?string
    {
        return $this->categorietva_coefficient;
    }

    public function setCategorietvaCoefficient(string $categorietva_coefficient): self
    {
        $this->categorietva_coefficient = $categorietva_coefficient;

        return $this;
    }

    public function getCategorietvaNom(): ?string
    {
        return $this->categorietva_nom;
    }

    public function setCategorietvaNom(?string $categorietva_nom): self
    {
        $this->categorietva_nom = $categorietva_nom;

        return $this;
    }

    /**
     * @return Collection|Customers[]
     */
    public function getCustomers(): Collection
    {
        return $this->customers;
    }

    public function addCustomer(Customers $customer): self
    {
        if (!$this->customers->contains($customer)) {
            $this->customers[] = $customer;
            $customer->setCategorietva($this);
        }

        return $this;
    }

    public function removeCustomer(Customers $customer): self
    {
        if ($this->customers->removeElement($customer)) {
            // set the owning side to null (unless already changed)
            if ($customer->getCategorietva() === $this) {
                $customer->setCategorietva(null);
            }
        }

        return $this;
    }

}
