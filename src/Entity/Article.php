<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity(repositoryClass=ArticleRepository::class)
* @ApiResource(
* attributes={
*          "pagination_items_per_page"=12
*     }
*)
*/
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ema;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptif;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $marque;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixachat;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateajout;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $categorie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $souscategorie;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $reference;

    /**
     * @ORM\Column(type="boolean")
     */
    private $statut;

    /**
     * @ORM\OneToMany(targetEntity=ArticleCommande::class, mappedBy="article", cascade={"persist"})
     */
    private $commandes;

    /**
     * @ORM\ManyToOne(targetEntity=Panier::class, inversedBy="idarticle")
     */
    private $panier;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nbimage;

   

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEma(): ?int
    {
        return $this->ema;
    }

    public function setEma(?int $ema): self
    {
        $this->ema = $ema;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(?string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPrixachat(): ?float
    {
        return $this->prixachat;
    }

    public function setPrixachat(?float $prixachat): self
    {
        $this->prixachat = $prixachat;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getDateajout(): ?\DateTimeInterface
    {
        return $this->dateajout;
    }

    public function setDateajout(\DateTimeInterface $dateajout): self
    {
        $this->dateajout = $dateajout;

        return $this;
    }

    public function getCategorie(): ?int
    {
        return $this->categorie;
    }

    public function setCategorie(?int $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getSouscategorie(): ?int
    {
        return $this->souscategorie;
    }

    public function setSouscategorie(?int $souscategorie): self
    {
        $this->souscategorie = $souscategorie;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

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

    public function getPanier(): ?Panier
    {
        return $this->panier;
    }

    public function setPanier(?Panier $panier): self
    {
        $this->panier = $panier;

        return $this;
    }

    public function getNbimage(): ?int
    {
        return $this->nbimage;
    }

    public function setNbimage(int $nbimage): self
    {
        $this->nbimage = $nbimage;

        return $this;
    }
   
}
