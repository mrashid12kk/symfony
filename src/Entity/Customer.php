<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $cust_name = null;

    #[ORM\Column(length: 255)]
    private ?string $cust_email = null;

    #[ORM\Column(length: 255)]
    private ?string $cust_type = null;

    #[ORM\Column(length: 255)]
    private ?string $license_regis_number = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $erp_account_company_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustName(): ?string
    {
        return $this->cust_name;
    }

    public function setCustName(string $cust_name): static
    {
        $this->cust_name = $cust_name;

        return $this;
    }

    public function getCustEmail(): ?string
    {
        return $this->cust_email;
    }

    public function setCustEmail(string $cust_email): static
    {
        $this->cust_email = $cust_email;

        return $this;
    }

    public function getCustType(): ?string
    {
        return $this->cust_type;
    }

    public function setCustType(string $cust_type): static
    {
        $this->cust_type = $cust_type;

        return $this;
    }

    public function getLicenseRegisNumber(): ?string
    {
        return $this->license_regis_number;
    }

    public function setLicenseRegisNumber(string $license_regis_number): static
    {
        $this->license_regis_number = $license_regis_number;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getErpAccountCompanyName(): ?string
    {
        return $this->erp_account_company_name;
    }

    public function setErpAccountCompanyName(string $erp_account_company_name): static
    {
        $this->erp_account_company_name = $erp_account_company_name;

        return $this;
    }
}
