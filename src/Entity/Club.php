<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Club
 *
 * @ORM\Table(name="club", indexes={@ORM\Index(name="IDX_B8EE3872A6E44244", columns={"pays_id"})})
 * @ORM\Entity
 */
class Club
{
    /**
     * @var int
     *
     * @Groups({"club"})
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Groups({"club"})
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @Groups({"club"})
     * @ORM\Column(name="creation", type="date", nullable=false)
     */
    private $creation;

    /**
     * @var string|null
     *
     * @Groups({"club"})
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="stade", type="string", length=255, nullable=false)
     */
    private $stade;

    /**
     * @var \Pays
     *
     * @Groups({"club"})
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pays_id", referencedColumnName="id")
     * })
     */
    private $pays;

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

    public function getCreation(): ?\DateTimeInterface
    {
        return $this->creation;
    }

    public function setCreation(\DateTimeInterface $creation): self
    {
        $this->creation = $creation;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getStade(): ?string
    {
        return $this->stade;
    }

    public function setStade(string $stade): self
    {
        $this->stade = $stade;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }


}
