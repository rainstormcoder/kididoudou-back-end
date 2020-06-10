<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PanierRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PanierRepository::class)
 */
class Panier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $statut;

    /**
     * @ORM\OneToMany(targetEntity=article::class, mappedBy="panier")
     */
    private $idarticle;

    public function __construct()
    {
        $this->idarticle = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection|article[]
     */
    public function getIdarticle(): Collection
    {
        return $this->idarticle;
    }

    public function addIdarticle(article $idarticle): self
    {
        if (!$this->idarticle->contains($idarticle)) {
            $this->idarticle[] = $idarticle;
            $idarticle->setPanier($this);
        }

        return $this;
    }

    public function removeIdarticle(article $idarticle): self
    {
        if ($this->idarticle->contains($idarticle)) {
            $this->idarticle->removeElement($idarticle);
            // set the owning side to null (unless already changed)
            if ($idarticle->getPanier() === $this) {
                $idarticle->setPanier(null);
            }
        }

        return $this;
    }
}
