<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur")
 * @ORM\Entity
 */
class Joueur
{
    /**
     * @var int
     *
     * @Groups({"joueur"})
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Groups({"joueur"})
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @Groups({"joueur"})
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @Groups({"joueur"})
     * @ORM\Column(name="naissance", type="date", nullable=false)
     */
    private $naissance;

    /**
     * @var string
     *
     * @Groups({"joueur"})
     * @ORM\Column(name="photo", type="string", length=255, nullable=false)
     */
    private $photo;

    /**
     * @var string
     *
     * @Groups({"joueur"})
     * @ORM\Column(name="poste", type="string", length=255, nullable=false)
     */
    private $poste;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @Groups({"joueur"})
     * @ORM\ManyToMany(targetEntity="Groupe", mappedBy="joueur")
     */
    private $groupe;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @Groups({"joueur"})
     * @ORM\ManyToMany(targetEntity="Pays", inversedBy="joueur", fetch="EAGER")
     * @ORM\JoinTable(name="joueur_pays",
     *   joinColumns={
     *     @ORM\JoinColumn(name="joueur_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="pays_id", referencedColumnName="id")
     *   }
     * )
     */
    private $pays;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groupe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pays = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNaissance(): ?\DateTimeInterface
    {
        return $this->naissance;
    }

    public function setNaissance(\DateTimeInterface $naissance): self
    {
        $this->naissance = $naissance;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * @return Collection<int, Groupe>
     */
    public function getGroupe(): Collection
    {
        return $this->groupe;
    }

    public function addGroupe(Groupe $groupe): self
    {
        if (!$this->groupe->contains($groupe)) {
            $this->groupe[] = $groupe;
            $groupe->addJoueur($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        if ($this->groupe->removeElement($groupe)) {
            $groupe->removeJoueur($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Pays>
     */
    public function getPays(): Collection
    {
        return $this->pays;
    }

    public function addPay(Pays $pay): self
    {
        if (!$this->pays->contains($pay)) {
            $this->pays[] = $pay;
        }

        return $this;
    }

    public function removePay(Pays $pay): self
    {
        $this->pays->removeElement($pay);

        return $this;
    }

}
