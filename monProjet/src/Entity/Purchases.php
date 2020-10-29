<?php

namespace App\Entity;

use App\Repository\PurchasesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PurchasesRepository::class)
 */
class Purchases
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
    private $purchases_suppliersref;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $purchases_date;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2, nullable=true)
     */
    private $purchases_price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $purchases_quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Suppliers::class, inversedBy="purchases")
     * @ORM\JoinColumn(nullable=false)
     */
    private $suppliers_id;

    /**
     * @ORM\ManyToOne(targetEntity=Products::class, inversedBy="purchases")
     * @ORM\JoinColumn(nullable=false)
     */
    private $products_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPurchasesSuppliersref(): ?string
    {
        return $this->purchases_suppliersref;
    }

    public function setPurchasesSuppliersref(?string $purchases_suppliersref): self
    {
        $this->purchases_suppliersref = $purchases_suppliersref;

        return $this;
    }

    public function getPurchasesDate(): ?\DateTimeInterface
    {
        return $this->purchases_date;
    }

    public function setPurchasesDate(?\DateTimeInterface $purchases_date): self
    {
        $this->purchases_date = $purchases_date;

        return $this;
    }

    public function getPurchasesPrice(): ?string
    {
        return $this->purchases_price;
    }

    public function setPurchasesPrice(?string $purchases_price): self
    {
        $this->purchases_price = $purchases_price;

        return $this;
    }

    public function getPurchasesQuantity(): ?int
    {
        return $this->purchases_quantity;
    }

    public function setPurchasesQuantity(?int $purchases_quantity): self
    {
        $this->purchases_quantity = $purchases_quantity;

        return $this;
    }

    public function getSuppliersId(): ?Suppliers
    {
        return $this->suppliers_id;
    }

    public function setSuppliersId(?Suppliers $suppliers_id): self
    {
        $this->suppliers_id = $suppliers_id;

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
}
