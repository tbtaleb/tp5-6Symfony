<?php

namespace App\Entity;

use App\Repository\InstitueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstitueRepository::class)]
class Institue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $institue_id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomi = null;

    #[ORM\OneToMany(targetEntity: Etudiant::class, mappedBy: 'instit')]
    private Collection $etudiants;

    public function __construct()
    {
        $this->etudiants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInstitueId(): ?int
    {
        return $this->institue_id;
    }

    public function setInstitueId(int $institue_id): static
    {
        $this->institue_id = $institue_id;

        return $this;
    }

    public function getNomi(): ?string
    {
        return $this->nomi;
    }

    public function setNomi(string $nomi): static
    {
        $this->nomi = $nomi;

        return $this;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getEtudiants(): Collection
    {
        return $this->etudiants;
    }

    public function addEtudiant(Etudiant $etudiant): static
    {
        if (!$this->etudiants->contains($etudiant)) {
            $this->etudiants->add($etudiant);
            $etudiant->setInstit($this);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): static
    {
        if ($this->etudiants->removeElement($etudiant)) {
            // set the owning side to null (unless already changed)
            if ($etudiant->getInstit() === $this) {
                $etudiant->setInstit(null);
            }
        }

        return $this;
    }
}
