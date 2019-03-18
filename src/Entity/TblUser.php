<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TblUserRepository")
 */
class TblUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $user_email;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_password;

    /**
     * @ORM\Column(type="smallint")
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TblEvent", mappedBy="user")
     */
    private $tblEvents;

    public function __construct()
    {
        $this->tblEvents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserEmail(): ?string
    {
        return $this->user_email;
    }

    public function setUserEmail(?string $user_email): self
    {
        $this->user_email = $user_email;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(?string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getUserPassword(): ?string
    {
        return $this->user_password;
    }

    public function setUserPassword(string $user_password): self
    {
        $this->user_password = $user_password;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|TblEvent[]
     */
    public function getTblEvents(): Collection
    {
        return $this->tblEvents;
    }

    public function addTblEvent(TblEvent $tblEvent): self
    {
        if (!$this->tblEvents->contains($tblEvent)) {
            $this->tblEvents[] = $tblEvent;
            $tblEvent->setUser($this);
        }

        return $this;
    }

    public function removeTblEvent(TblEvent $tblEvent): self
    {
        if ($this->tblEvents->contains($tblEvent)) {
            $this->tblEvents->removeElement($tblEvent);
            // set the owning side to null (unless already changed)
            if ($tblEvent->getUser() === $this) {
                $tblEvent->setUser(null);
            }
        }

        return $this;
    }
}
