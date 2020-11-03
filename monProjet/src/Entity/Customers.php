<?php

namespace App\Entity;

use App\Repository\CustomersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomersRepository::class)
 */
class Customers
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
    private $customers_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $customers_address;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $customers_zipcode;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $customers_city;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $customers_phone;

    /**
     * @ORM\ManyToOne(targetEntity=Employee::class, inversedBy="customers")
     */
    private $employee;

    /**
     * @ORM\ManyToOne(targetEntity=Categorietva::class, inversedBy="customers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorietva;

    /**
     * @ORM\OneToMany(targetEntity=Totalorder::class, mappedBy="customers", orphanRemoval=true)
     */
    private $totalorders;

    /**
     * @ORM\OneToMany(targetEntity=Delivery::class, mappedBy="customers")
     */
    private $deliveries;

    public function __construct()
    {
        $this->totalorders = new ArrayCollection();
        $this->deliveries = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomersName(): ?string
    {
        return $this->customers_name;
    }

    public function setCustomersName(string $customers_name): self
    {
        $this->customers_name = $customers_name;

        return $this;
    }

    public function getCustomersAddress(): ?string
    {
        return $this->customers_address;
    }

    public function setCustomersAddress(?string $customers_address): self
    {
        $this->customers_address = $customers_address;

        return $this;
    }

    public function getCustomersZipcode(): ?string
    {
        return $this->customers_zipcode;
    }

    public function setCustomersZipcode(?string $customers_zipcode): self
    {
        $this->customers_zipcode = $customers_zipcode;

        return $this;
    }

    public function getCustomersCity(): ?string
    {
        return $this->customers_city;
    }

    public function setCustomersCity(?string $customers_city): self
    {
        $this->customers_city = $customers_city;

        return $this;
    }

    public function getCustomersPhone(): ?string
    {
        return $this->customers_phone;
    }

    public function setCustomersPhone(?string $customers_phone): self
    {
        $this->customers_phone = $customers_phone;

        return $this;
    }

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(?Employee $employee): self
    {
        $this->employee = $employee;

        return $this;
    }

    public function getCategorietva(): ?Categorietva
    {
        return $this->categorietva;
    }

    public function setCategorietva(?Categorietva $categorietva): self
    {
        $this->categorietva = $categorietva;

        return $this;
    }

    /**
     * @return Collection|Totalorder[]
     */
    public function getTotalorders(): Collection
    {
        return $this->totalorders;
    }

    public function addTotalorder(Totalorder $totalorder): self
    {
        if (!$this->totalorders->contains($totalorder)) {
            $this->totalorders[] = $totalorder;
            $totalorder->setCustomers($this);
        }

        return $this;
    }

    public function removeTotalorder(Totalorder $totalorder): self
    {
        if ($this->totalorders->removeElement($totalorder)) {
            // set the owning side to null (unless already changed)
            if ($totalorder->getCustomers() === $this) {
                $totalorder->setCustomers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Delivery[]
     */
    public function getDeliveries(): Collection
    {
        return $this->deliveries;
    }

    public function addDelivery(Delivery $delivery): self
    {
        if (!$this->deliveries->contains($delivery)) {
            $this->deliveries[] = $delivery;
            $delivery->setCustomers($this);
        }

        return $this;
    }

    public function removeDelivery(Delivery $delivery): self
    {
        if ($this->deliveries->removeElement($delivery)) {
            // set the owning side to null (unless already changed)
            if ($delivery->getCustomers() === $this) {
                $delivery->setCustomers(null);
            }
        }

        return $this;
    }


}
