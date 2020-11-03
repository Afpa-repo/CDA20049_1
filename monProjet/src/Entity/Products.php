<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 */
class Products
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
    private $products_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $products_description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $products_stock;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $products_picture;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $products_status;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2, nullable=true)
     */
    private $products_price;

    /**
     * @ORM\OneToMany(targetEntity=Orderdetail::class, mappedBy="products", orphanRemoval=true)
     */
    private $orderdetails;

    /**
     * @ORM\OneToMany(targetEntity=Purchases::class, mappedBy="products", orphanRemoval=true)
     */
    private $purchases;

    /**
     * @ORM\ManyToOne(targetEntity=Rubrique::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rubrique;

    public function __construct()
    {
        $this->orderdetails = new ArrayCollection();
        $this->purchases = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductsName(): ?string
    {
        return $this->products_name;
    }

    public function setProductsName(string $products_name): self
    {
        $this->products_name = $products_name;

        return $this;
    }

    public function getProductsDescription(): ?string
    {
        return $this->products_description;
    }

    public function setProductsDescription(?string $products_description): self
    {
        $this->products_description = $products_description;

        return $this;
    }

    public function getProductsStock(): ?int
    {
        return $this->products_stock;
    }

    public function setProductsStock(?int $products_stock): self
    {
        $this->products_stock = $products_stock;

        return $this;
    }

    public function getProductsPicture(): ?string
    {
        return $this->products_picture;
    }

    public function setProductsPicture(?string $products_picture): self
    {
        $this->products_picture = $products_picture;

        return $this;
    }

    public function getProductsStatus(): ?bool
    {
        return $this->products_status;
    }

    public function setProductsStatus(?bool $products_status): self
    {
        $this->products_status = $products_status;

        return $this;
    }

    public function getProductsPrice(): ?string
    {
        return $this->products_price;
    }

    public function setProductsPrice(?string $products_price): self
    {
        $this->products_price = $products_price;

        return $this;
    }

    /**
     * @return Collection|Orderdetail[]
     */
    public function getOrderdetails(): Collection
    {
        return $this->orderdetails;
    }

    public function addOrderdetail(Orderdetail $orderdetail): self
    {
        if (!$this->orderdetails->contains($orderdetail)) {
            $this->orderdetails[] = $orderdetail;
            $orderdetail->setProducts($this);
        }

        return $this;
    }

    public function removeOrderdetail(Orderdetail $orderdetail): self
    {
        if ($this->orderdetails->removeElement($orderdetail)) {
            // set the owning side to null (unless already changed)
            if ($orderdetail->getProducts() === $this) {
                $orderdetail->setProducts(null);
            }
        }

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
            $purchase->setProducts($this);
        }

        return $this;
    }

    public function removePurchase(Purchases $purchase): self
    {
        if ($this->purchases->removeElement($purchase)) {
            // set the owning side to null (unless already changed)
            if ($purchase->getProducts() === $this) {
                $purchase->setProducts(null);
            }
        }

        return $this;
    }

    public function getRubrique(): ?Rubrique
    {
        return $this->rubrique;
    }

    public function setRubrique(?Rubrique $rubrique): self
    {
        $this->rubrique = $rubrique;

        return $this;
    }
}
