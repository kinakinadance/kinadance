<?php

namespace App\Entity;
use App\Repository\TblLevelRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
/**
 * @ORM\Entity(repositoryClass="App\Repository\TblLevelRepository")
 */
class TblLevel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=16, nullable=true)
     */
    private $level_name;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TblCourse", mappedBy="level")
     */
    private $levels;


    public function __construct()
    {
        $this->levels = new ArrayCollection();
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
    public function getLevelName()
    {
        return $this->level_name;
    }

    /**
     * @param mixed $level_name
     */
    public function setLevelName($level_name)
    {
        $this->level_name = $level_name;
    }

    /**
     * @return Collection|Product[]
     */
    public function getLevels(): Collection
    {
        return $this->levels;
    }
}
