<?php

namespace App\Entity;

use App\Repository\TblLevelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TblCourseRepository")
 */
class TblCourse
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */

    private $id;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $course_name;

    /**
     * @ORM\Column(type="string", length=48, nullable=true)
     */
    private $instruktor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TblLevel", inversedBy="levels")
     */
    private $level;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TblEvent", mappedBy="course")
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
     * @return mixed
     */
    public function getCourseName()
    {
        return $this->course_name;
    }

    /**
     * @param mixed $course_name
     */
    public function setCourseName($course_name)
    {
        $this->course_name = $course_name;
    }

    /**
     * @return mixed
     */
    public function getInstruktor()
    {
        return $this->instruktor;
    }

    /**
     * @param mixed $instruktor
     */
    public function setInstruktor($instruktor)
    {
        $this->instruktor = $instruktor;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
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
            $tblEvent->setCourse($this);
        }

        return $this;
    }

    public function removeTblEvent(TblEvent $tblEvent): self
    {
        if ($this->tblEvents->contains($tblEvent)) {
            $this->tblEvents->removeElement($tblEvent);
            // set the owning side to null (unless already changed)
            if ($tblEvent->getCourse() === $this) {
                $tblEvent->setCourse(null);
            }
        }

        return $this;
    }






}
