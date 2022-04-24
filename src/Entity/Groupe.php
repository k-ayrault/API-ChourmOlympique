<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table(name="groupe", indexes={@ORM\Index(name="IDX_4B98C212ABEACD6", columns={"match_id"}), @ORM\Index(name="IDX_4B98C2161190A32", columns={"club_id"})})
 * @ORM\Entity
 */
class Groupe
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
     * @var \MatchFoot
     *
     * @ORM\ManyToOne(targetEntity="MatchFoot")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="match_id", referencedColumnName="id")
     * })
     */
    private $match;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Joueur", inversedBy="groupe")
     * @ORM\JoinTable(name="groupe_joueur",
     *   joinColumns={
     *     @ORM\JoinColumn(name="groupe_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="joueur_id", referencedColumnName="id")
     *   }
     * )
     */
    private $joueur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->joueur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatch(): ?MatchFoot
    {
        return $this->match;
    }

    public function setMatch(?MatchFoot $match): self
    {
        $this->match = $match;

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

    /**
     * @return Collection<int, Joueur>
     */
    public function getJoueur(): Collection
    {
        return $this->joueur;
    }

    public function addJoueur(Joueur $joueur): self
    {
        if (!$this->joueur->contains($joueur)) {
            $this->joueur[] = $joueur;
        }

        return $this;
    }

    public function removeJoueur(Joueur $joueur): self
    {
        $this->joueur->removeElement($joueur);

        return $this;
    }

}
