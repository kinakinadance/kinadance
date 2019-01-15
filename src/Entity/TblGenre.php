<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TblGenreRepository")
 */
class TblGenre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $genre_name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TblEvent", mappedBy="genre")
     */
    private $tblEvents;

    public function __construct()
    {
        $this->tblEvents = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getGenreName()
    {
        return $this->genre_name;
    }

    /**
     * @param mixed $genre_name
     */
    public function setGenreName($genre_name)
    {
        $this->genre_name = $genre_name;
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
            $tblEvent->setGenre($this);
        }

        return $this;
    }

    public function removeTblEvent(TblEvent $tblEvent): self
    {
        if ($this->tblEvents->contains($tblEvent)) {
            $this->tblEvents->removeElement($tblEvent);
            // set the owning side to null (unless already changed)
            if ($tblEvent->getGenre() === $this) {
                $tblEvent->setGenre(null);
            }
        }

        return $this;
    }


}
