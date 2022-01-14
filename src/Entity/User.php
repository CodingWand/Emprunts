<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 *     fields={"id"}
 * )
 * @UniqueEntity(
 *     fields={"username"}
 * )
 * @UniqueEntity(
 *     fields={"email"}
 * )
 * @UniqueEntity(
 *     fields={"password"}
 * )
 * @UniqueEntity(
 *     fields={"uid"}
 * )
 */
class User implements UserInterface
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
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     min = 8,
     *     minMessage = "Your password should be at least 8 characters long."
     * )
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="This value should be equal to the password")
    */
    public $confirm_password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uid;

    /**
     * @ORM\Column(type="array")
     */
    private $roles = [];

    /**
     * @ORM\OneToMany(targetEntity=Borrowing::class, mappedBy="lend_by", orphanRemoval=true)
     */
    private $lended;

    /**
     * @ORM\OneToMany(targetEntity=Borrowing::class, mappedBy="borrowed_by")
     */
    private $borrowed;

    public function __construct()
    {
        $this->lended = new ArrayCollection();
        $this->borrowed = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

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

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return Collection|Borrowing[]
     */
    public function getLended(): Collection
    {
        return $this->lended;
    }

    public function addLended(Borrowing $lended): self
    {
        if (!$this->lended->contains($lended)) {
            $this->lended[] = $lended;
            $lended->setLendBy($this);
        }

        return $this;
    }

    public function removeLended(Borrowing $lended): self
    {
        if ($this->lended->removeElement($lended)) {
            // set the owning side to null (unless already changed)
            if ($lended->getLendBy() === $this) {
                $lended->setLendBy(null);
            }
        }

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
            $borrowed->setBorrowedBy($this);
        }

        return $this;
    }

    public function removeBorrowed(Borrowing $borrowed): self
    {
        if ($this->borrowed->removeElement($borrowed)) {
            // set the owning side to null (unless already changed)
            if ($borrowed->getBorrowedBy() === $this) {
                $borrowed->setBorrowedBy(null);
            }
        }

        return $this;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
