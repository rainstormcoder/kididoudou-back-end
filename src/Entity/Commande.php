<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
*/
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\Column(type="float")
     */
    private $fraisPort;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $modePaiement;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $coupon;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $provenance;

    /**
     * @ORM\Column(type="boolean")
     */
    private $statut;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateLivraison;

    /**
     * @ORM\OneToMany(targetEntity=ArticleCommande::class, mappedBy="commandes")
     */
    private $articlecommandes;

    public function __construct()
    {
        $this->articlecommandes = new ArrayCollection();
    }

   
  

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getFraisPort(): ?float
    {
        return $this->fraisPort;
    }

    public function setFraisPort(float $fraisPort): self
    {
        $this->fraisPort = $fraisPort;

        return $this;
    }

    public function getModePaiement(): ?string
    {
        return $this->modePaiement;
    }

    public function setModePaiement(string $modePaiement): self
    {
        $this->modePaiement = $modePaiement;

        return $this;
    }

    public function getCoupon(): ?float
    {
        return $this->coupon;
    }

    public function setCoupon(?float $coupon): self
    {
        $this->coupon = $coupon;

        return $this;
    }

    public function getProvenance(): ?string
    {
        return $this->provenance;
    }

    public function setProvenance(?string $provenance): self
    {
        $this->provenance = $provenance;

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

    public function getDateLivraison(): ?\DateTimeInterface
    {
        return $this->dateLivraison;
    }

    public function setDateLivraison(?\DateTimeInterface $dateLivraison): self
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    /**
     * @return Collection|ArticleCommande[]
     */
    public function getArticlecommandes(): Collection
    {
        return $this->articlecommandes;
    }

    public function addArticlecommande(ArticleCommande $articlecommande): self
    {
        if (!$this->articlecommandes->contains($articlecommande)) {
            $this->articlecommandes[] = $articlecommande;
            $articlecommande->setCommandes($this);
        }

        return $this;
    }

    public function removeArticlecommande(ArticleCommande $articlecommande): self
    {
        if ($this->articlecommandes->contains($articlecommande)) {
            $this->articlecommandes->removeElement($articlecommande);
            // set the owning side to null (unless already changed)
            if ($articlecommande->getCommandes() === $this) {
                $articlecommande->setCommandes(null);
            }
        }

        return $this;
    }

   
}
