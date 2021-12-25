<?php

namespace App\Entity;

use App\Repository\BorrowingRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=BorrowingRepository::class)
 * @UniqueEntity ("id")
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
    private $allowad_days;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $remarks;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $lendBy;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $borrowed_by;

    /**
     * @ORM\ManyToOne(targetEntity=Equipment::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipment;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAllowadDays(): ?int
    {
        return $this->allowad_days;
    }

    public function setAllowadDays(int $allowad_days): self
    {
        $this->allowad_days = $allowad_days;

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

    public function getLendBy(): ?User
    {
        return $this->lendBy;
    }

    public function setLendBy(?User $lendBy): self
    {
        $this->lendBy = $lendBy;

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
}
