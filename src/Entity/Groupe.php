<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupeRepository::class)]
class Groupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Utilisateur::class, mappedBy: 'relation')]
    private Collection $utilisateurs;

    #[ORM\ManyToMany(targetEntity: utilisateur::class, inversedBy: 'groupes')]
    private Collection $ralation;

    

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->ralation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Groupe>
     */

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): static
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->addRelation($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): static
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            $utilisateur->removeRelation($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, utilisateur>
     */
    public function getRalation(): Collection
    {
        return $this->ralation;
    }

    public function addRalation(utilisateur $ralation): static
    {
        if (!$this->ralation->contains($ralation)) {
            $this->ralation->add($ralation);
        }

        return $this;
    }

    public function removeRalation(utilisateur $ralation): static
    {
        $this->ralation->removeElement($ralation);

        return $this;
    }
    
    
}
