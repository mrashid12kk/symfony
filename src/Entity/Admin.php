<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $admin_name = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column]
    private ?int $admin_role = null;

    #[ORM\Column(length: 255)]
    private ?string $admin_email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdminName(): ?string
    {
        return $this->admin_name;
    }

    public function setAdminName(string $admin_name): static
    {
        $this->admin_name = $admin_name;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getAdminRole(): ?int
    {
        return $this->admin_role;
    }

    public function setAdminRole(int $admin_role): static
    {
        $this->admin_role = $admin_role;

        return $this;
    }

    public function getAdminEmail(): ?string
    {
        return $this->admin_email;
    }

    public function setAdminEmail(string $admin_email): static
    {
        $this->admin_email = $admin_email;

        return $this;
    }
}
