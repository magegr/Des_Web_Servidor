<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
class Module
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $credits = null;

    /**
     * @var Collection<int, Student>
     */
    #[ORM\OneToMany(targetEntity: Student::class, mappedBy: 'id_module')]
    private Collection $id_student;

    public function __construct()
    {
        $this->id_student = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCredits(): ?int
    {
        return $this->credits;
    }

    public function setCredits(int $credits): static
    {
        $this->credits = $credits;

        return $this;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getIdStudent(): Collection
    {
        return $this->id_student;
    }

    public function addIdStudent(Student $idStudent): static
    {
        if (!$this->id_student->contains($idStudent)) {
            $this->id_student->add($idStudent);
            $idStudent->setIdModule($this);
        }

        return $this;
    }

    public function removeIdStudent(Student $idStudent): static
    {
        if ($this->id_student->removeElement($idStudent)) {
            // set the owning side to null (unless already changed)
            if ($idStudent->getIdModule() === $this) {
                $idStudent->setIdModule(null);
            }
        }

        return $this;
    }
}
