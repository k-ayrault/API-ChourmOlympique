<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrat
 *
 * @ORM\Table(name="contrat", indexes={@ORM\Index(name="IDX_60349993A9E2D76C", columns={"joueur_id"}), @ORM\Index(name="IDX_6034999361190A32", columns={"club_id"})})
 * @ORM\Entity
 */
class Contrat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debut", type="date", nullable=false)
     */
    private $debut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fin", type="date", nullable=false)
     */
    private $fin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="detail_transfert", type="string", length=255, nullable=true)
     */
    private $detailTransfert;

    /**
     * @var bool
     *
     * @ORM\Column(name="hors_club", type="boolean", nullable=false)
     */
    private $horsClub;

    /**
     * @var \Club
     *
     * @ORM\ManyToOne(targetEntity="Club")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="club_id", referencedColumnName="id")
     * })
     */
    private $club;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur_id", referencedColumnName="id")
     * })
     */
    private $joueur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(\DateTimeInterface $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

        return $this;
    }

    public function getDetailTransfert(): ?string
    {
        return $this->detailTransfert;
    }

    public function setDetailTransfert(?string $detailTransfert): self
    {
        $this->detailTransfert = $detailTransfert;

        return $this;
    }

    public function getHorsClub(): ?bool
    {
        return $this->horsClub;
    }

    public function setHorsClub(bool $horsClub): self
    {
        $this->horsClub = $horsClub;

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(?Joueur $joueur): self
    {
        $this->joueur = $joueur;

        return $this;
    }


}
