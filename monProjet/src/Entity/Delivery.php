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
     * @ORM\Column(type="date", nullable=true)
     */
    private $delivery_date;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2, nullable=true)
     */
    private $delivery_quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Orderdetail::class, inversedBy="deliveries")
     */
    private $orderdetail_id;

    /**
     * @ORM\ManyToOne(targetEntity=Customers::class, inversedBy="deliveries")
     */
    private $customers_id;

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

    public function getOrderdetailId(): ?Orderdetail
    {
        return $this->orderdetail_id;
    }

    public function setOrderdetailId(?Orderdetail $orderdetail_id): self
    {
        $this->orderdetail_id = $orderdetail_id;

        return $this;
    }

    public function getCustomersId(): ?Customers
    {
        return $this->customers_id;
    }

    public function setCustomersId(?Customers $customers_id): self
    {
        $this->customers_id = $customers_id;

        return $this;
    }
}
