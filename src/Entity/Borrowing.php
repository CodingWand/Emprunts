<?php

namespace App\Entity;

use App\Repository\BorrowingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BorrowingRepository::class)
 */
class Borrowing
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="lended")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lend_by;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="borrowed")
     * @ORM\JoinColumn(nullable=false)
     */
    private $borrowed_by;

    /**
     * @ORM\ManyToOne(targetEntity=Equipment::class, inversedBy="borrowed")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipment;

    /**
     * @ORM\Column(type="datetime")
     */
    private $started_on;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ended_on;

    /**
     * @ORM\Column(type="integer")
     */
    private $allowed_days;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $remarks;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLendBy(): ?User
    {
        return $this->lend_by;
    }

    public function setLendBy(?User $lend_by): self
    {
        $this->lend_by = $lend_by;

        return $this;
    }

    public function getBorrowedBy(): ?User
    {
        return $this->borrowed_by;
    }

    public function setBorrowedBy(?User $borrowed_by): self
    {
        $this->borrowed_by = $borrowed_by;

        return $this;
    }

    public function getEquipment(): ?Equipment
    {
        return $this->equipment;
    }

    public function setEquipment(?Equipment $equipment): self
    {
        $this->equipment = $equipment;

        return $this;
    }

    public function getStartedOn(): ?\DateTimeInterface
    {
        return $this->started_on;
    }

    public function setStartedOn(\DateTimeInterface $started_on): self
    {
        $this->started_on = $started_on;

        return $this;
    }

    public function getEndedOn(): ?\DateTimeInterface
    {
        return $this->ended_on;
    }

    public function setEndedOn(\DateTimeInterface $ended_on): self
    {
        $this->ended_on = $ended_on;

        return $this;
    }

    public function getAllowedDays(): ?int
    {
        return $this->allowed_days;
    }

    public function setAllowedDays(int $allowed_days): self
    {
        $this->allowed_days = $allowed_days;

        return $this;
    }

    public function getRemarks(): ?string
    {
        return $this->remarks;
    }

    public function setRemarks(?string $remarks): self
    {
        $this->remarks = $remarks;

        return $this;
    }
}
