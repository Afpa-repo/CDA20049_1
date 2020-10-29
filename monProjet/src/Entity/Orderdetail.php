<?php

namespace App\Entity;

use App\Repository\OrderdetailRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderdetailRepository::class)
 */
class Orderdetail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    private $orderdetail_price;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2)
     */
    private $orderdetail_quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Totalorder::class, inversedBy="orderdetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $totalorder_id;

    /**
     * @ORM\ManyToOne(targetEntity=Products::class, inversedBy="orderdetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $products_id;

    /**
     * @ORM\OneToMany(targetEntity=Delivery::class, mappedBy="orderdetail_id")
     */
    private $deliveries;

    public function __construct()
    {
        $this->deliveries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderdetailPrice(): ?string
    {
        return $this->orderdetail_price;
    }

    public function setOrderdetailPrice(string $orderdetail_price): self
    {
        $this->orderdetail_price = $orderdetail_price;

        return $this;
    }

    public function getOrderdetailQuantity(): ?string
    {
        return $this->orderdetail_quantity;
    }

    public function setOrderdetailQuantity(string $orderdetail_quantity): self
    {
        $this->orderdetail_quantity = $orderdetail_quantity;

        return $this;
    }

    public function getTotalorderId(): ?Totalorder
    {
        return $this->totalorder_id;
    }

    public function setTotalorderId(?Totalorder $totalorder_id): self
    {
        $this->totalorder_id = $totalorder_id;

        return $this;
    }

    public function getProductsId(): ?Products
    {
        return $this->products_id;
    }

    public function setProductsId(?Products $products_id): self
    {
        $this->products_id = $products_id;

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
            $delivery->setOrderdetailId($this);
        }

        return $this;
    }

    public function removeDelivery(Delivery $delivery): self
    {
        if ($this->deliveries->removeElement($delivery)) {
            // set the owning side to null (unless already changed)
            if ($delivery->getOrderdetailId() === $this) {
                $delivery->setOrderdetailId(null);
            }
        }

        return $this;
    }
}
