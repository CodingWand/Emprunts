<?php

namespace App\Entity;

use App\Repository\EquipmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=EquipmentRepository::class)
 * @UniqueEntity ("id", "uid", "name")
 */
class Equipment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uid;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="integer")
     */
    private $availableStock;

    /**
     * @ORM\Column(type="integer")
     */
    private $allowedDays;

    /**
     * @ORM\OneToMany(targetEntity=Borrowing::class, mappedBy="equipment")
     */
    private $borrowed;

    public function __construct()
    {
        $this->borrowed = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUid(): ?string
    {
        return $this->uid;
    }

    public function setUid(string $uid): self
    {
        $this->uid = $uid;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getAvailableStock(): ?int
    {
        return $this->availableStock;
    }

    public function setAvailableStock(int $availableStock): self
    {
        $this->availableStock = $availableStock;

        return $this;
    }

    public function getAllowedDays(): ?int
    {
        return $this->allowedDays;
    }

    public function setAllowedDays(int $allowedDays): self
    {
        $this->allowedDays = $allowedDays;

        return $this;
    }

    /**
     * @return Collection|Borrowing[]
     */
    public function getBorrowed(): Collection
    {
        return $this->borrowed;
    }

    public function addBorrowed(Borrowing $borrowed): self
    {
        if (!$this->borrowed->contains($borrowed)) {
            $this->borrowed[] = $borrowed;
            $borrowed->setEquipment($this);
        }

        return $this;
    }

    public function removeBorrowed(Borrowing $borrowed): self
    {
        if ($this->borrowed->removeElement($borrowed)) {
            // set the owning side to null (unless already changed)
            if ($borrowed->getEquipment() === $this) {
                $borrowed->setEquipment(null);
            }
        }

        return $this;
    }
}
