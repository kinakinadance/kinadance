<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TblCategoryRepository")
 */
class TblCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $category_name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TblEvent", mappedBy="category")
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

    public function getCategoryName(): ?string
    {
        return $this->category_name;
    }

    public function setCategoryName(string $category_name): self
    {
        $this->category_name = $category_name;

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
            $tblEvent->setCategory($this);
        }

        return $this;
    }

    public function removeTblEvent(TblEvent $tblEvent): self
    {
        if ($this->tblEvents->contains($tblEvent)) {
            $this->tblEvents->removeElement($tblEvent);
            // set the owning side to null (unless already changed)
            if ($tblEvent->getCategory() === $this) {
                $tblEvent->setCategory(null);
            }
        }

        return $this;
    }
}
