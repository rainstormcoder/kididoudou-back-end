<?php

namespace App\Entity;
use App\Entity\Adresse;
use App\Entity\CompteClient;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
        * normalizationContext={"groups"={"client:read"}},
        * denormalizationContext={"groups"={"client:write"}}
*)
 * @ORM\Entity(repositoryClass=ClientRepository::class)

 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"client:read", "client:write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"client:read", "client:write"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
      * @Groups({"client:read", "client:write"})
     */
    private $prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"client:read", "client:write"})
     */
    private $datenaissance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"client:read", "client:write"})
     */
    private $tel;


    /**
     * @ORM\Column(type="datetime")
     * @Groups({"client:read", "client:write"})
     */
    private $date;


    /**
     * @ORM\OneToMany(targetEntity=Adresse::class, mappedBy="client", orphanRemoval=true, cascade={"persist"})
     * @Groups({"client:read", "client:write"})
     * @ApiSubresource
     */
    private $adresse;

    /**
     * @ORM\OneToOne(targetEntity=CompteClient::class, cascade={"persist", "remove"})
     * @Groups({"client:read", "client:write"})
     */
    private $compteclient;

    

    public function __construct()
    {
        $this->adresse = new ArrayCollection();
    }


    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(?\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(?int $tel): self
    {
        $this->tel = $tel;

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


    /**
     * @return Collection|Adresse[]
     */
    public function getAdresse(): Collection
    {
        return $this->adresse;
    }

    public function addAdresse(Adresse $adresse): self
    {
        if (!$this->adresse->contains($adresse)) {
            $this->adresse[] = $adresse;
            $adresse->setClient($this);
        }

        return $this;
    }

    public function removeAdresse(Adresse $adresse): self
    {
        if ($this->adresse->contains($adresse)) {
            $this->adresse->removeElement($adresse);
            // set the owning side to null (unless already changed)
            if ($adresse->getClient() === $this) {
                $adresse->setClient(null);
            }
        }

        return $this;
    }

    public function getCompteclient(): ?CompteClient
    {
        return $this->compteclient;
    }

    public function setCompteclient(?CompteClient $compteclient): self
    {
        $this->compteclient = $compteclient;

        return $this;
    }
}
