<?php

namespace App\Entity;

use App\Repository\TotalorderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TotalorderRepository::class)
 */
class Totalorder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $totalorder_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $totalorder_billaddress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $totalorder_deliveryaddress;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2, nullable=true)
     */
    private $totalorder_discount;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $totalorder_invoicenb;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $totalorder_invoicedate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $totalorder_deadline;

    /**
     * @ORM\ManyToOne(targetEntity=Customers::class, inversedBy="totalorders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customers_id;

    /**
     * @ORM\OneToMany(targetEntity=Orderdetail::class, mappedBy="totalorder_id", orphanRemoval=true)
     */
    private $orderdetails;

    public function __construct()
    {
        $this->orderdetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotalorderDate(): ?\DateTimeInterface
    {
        return $this->totalorder_date;
    }

    public function setTotalorderDate(\DateTimeInterface $totalorder_date): self
    {
        $this->totalorder_date = $totalorder_date;

        return $this;
    }

    public function getTotalorderBilladdress(): ?string
    {
        return $this->totalorder_billaddress;
    }

    public function setTotalorderBilladdress(?string $totalorder_billaddress): self
    {
        $this->totalorder_billaddress = $totalorder_billaddress;

        return $this;
    }

    public function getTotalorderDeliveryaddress(): ?string
    {
        return $this->totalorder_deliveryaddress;
    }

    public function setTotalorderDeliveryaddress(?string $totalorder_deliveryaddress): self
    {
        $this->totalorder_deliveryaddress = $totalorder_deliveryaddress;

        return $this;
    }

    public function getTotalorderDiscount(): ?string
    {
        return $this->totalorder_discount;
    }

    public function setTotalorderDiscount(?string $totalorder_discount): self
    {
        $this->totalorder_discount = $totalorder_discount;

        return $this;
    }

    public function getTotalorderInvoicenb(): ?int
    {
        return $this->totalorder_invoicenb;
    }

    public function setTotalorderInvoicenb(?int $totalorder_invoicenb): self
    {
        $this->totalorder_invoicenb = $totalorder_invoicenb;

        return $this;
    }

    public function getTotalorderInvoicedate(): ?\DateTimeInterface
    {
        return $this->totalorder_invoicedate;
    }

    public function setTotalorderInvoicedate(?\DateTimeInterface $totalorder_invoicedate): self
    {
        $this->totalorder_invoicedate = $totalorder_invoicedate;

        return $this;
    }

    public function getTotalorderDeadline(): ?\DateTimeInterface
    {
        return $this->totalorder_deadline;
    }

    public function setTotalorderDeadline(?\DateTimeInterface $totalorder_deadline): self
    {
        $this->totalorder_deadline = $totalorder_deadline;

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
            $orderdetail->setTotalorderId($this);
        }

        return $this;
    }

    public function removeOrderdetail(Orderdetail $orderdetail): self
    {
        if ($this->orderdetails->removeElement($orderdetail)) {
            // set the owning side to null (unless already changed)
            if ($orderdetail->getTotalorderId() === $this) {
                $orderdetail->setTotalorderId(null);
            }
        }

        return $this;
    }
}
