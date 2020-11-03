<?php

namespace App\Entity;

use App\Repository\DeliveryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeliveryRepository::class)
 */
class Delivery
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $delivery_date;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2, nullable=true)
     */
    private $delivery_quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Orderdetail::class, inversedBy="deliveries")
     */
    private $orderdetail;

    /**
     * @ORM\ManyToOne(targetEntity=Customers::class, inversedBy="deliveries")
     */
    private $customers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeliveryDate(): ?\DateTimeInterface
    {
        return $this->delivery_date;
    }

    public function setDeliveryDate(?\DateTimeInterface $delivery_date): self
    {
        $this->delivery_date = $delivery_date;

        return $this;
    }

    public function getDeliveryQuantity(): ?string
    {
        return $this->delivery_quantity;
    }

    public function setDeliveryQuantity(?string $delivery_quantity): self
    {
        $this->delivery_quantity = $delivery_quantity;

        return $this;
    }

    public function getOrderdetail(): ?Orderdetail
    {
        return $this->orderdetail;
    }

    public function setOrderdetail(?Orderdetail $orderdetail): self
    {
        $this->orderdetail = $orderdetail;

        return $this;
    }

    public function getCustomers(): ?Customers
    {
        return $this->customers;
    }

    public function setCustomers(?Customers $customers): self
    {
        $this->customers = $customers;

        return $this;
    }
}
