<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classement
 *
 * @ORM\Table(name="classement", indexes={@ORM\Index(name="IDX_55EE9D6D61190A32", columns={"club_id"}), @ORM\Index(name="IDX_55EE9D6DF965414C", columns={"saison_id"}), @ORM\Index(name="IDX_55EE9D6D7B39D312", columns={"competition_id"})})
 * @ORM\Entity
 */
class Classement
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
     * @var string|null
     *
     * @ORM\Column(name="groupe", type="string", length=255, nullable=true)
     */
    private $groupe;

    /**
     * @var int
     *
     * @ORM\Column(name="points", type="integer", nullable=false)
     */
    private $points;

    /**
     * @var int
     *
     * @ORM\Column(name="match_joue", type="integer", nullable=false)
     */
    private $matchJoue;

    /**
     * @var int
     *
     * @ORM\Column(name="match_gagne", type="integer", nullable=false)
     */
    private $matchGagne;

    /**
     * @var int
     *
     * @ORM\Column(name="match_perdu", type="integer", nullable=false)
     */
    private $matchPerdu;

    /**
     * @var int
     *
     * @ORM\Column(name="match_nul", type="integer", nullable=false)
     */
    private $matchNul;

    /**
     * @var int
     *
     * @ORM\Column(name="but_marque", type="integer", nullable=false)
     */
    private $butMarque;

    /**
     * @var int
     *
     * @ORM\Column(name="but_concede", type="integer", nullable=false)
     */
    private $butConcede;

    /**
     * @var int
     *
     * @ORM\Column(name="diff_but", type="integer", nullable=false)
     */
    private $diffBut;

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
     * @var \Saison
     *
     * @ORM\ManyToOne(targetEntity="Saison")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="saison_id", referencedColumnName="id")
     * })
     */
    private $saison;

    /**
     * @var \Competition
     *
     * @ORM\ManyToOne(targetEntity="Competition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="competition_id", referencedColumnName="id")
     * })
     */
    private $competition;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(?string $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getMatchJoue(): ?int
    {
        return $this->matchJoue;
    }

    public function setMatchJoue(int $matchJoue): self
    {
        $this->matchJoue = $matchJoue;

        return $this;
    }

    public function getMatchGagne(): ?int
    {
        return $this->matchGagne;
    }

    public function setMatchGagne(int $matchGagne): self
    {
        $this->matchGagne = $matchGagne;

        return $this;
    }

    public function getMatchPerdu(): ?int
    {
        return $this->matchPerdu;
    }

    public function setMatchPerdu(int $matchPerdu): self
    {
        $this->matchPerdu = $matchPerdu;

        return $this;
    }

    public function getMatchNul(): ?int
    {
        return $this->matchNul;
    }

    public function setMatchNul(int $matchNul): self
    {
        $this->matchNul = $matchNul;

        return $this;
    }

    public function getButMarque(): ?int
    {
        return $this->butMarque;
    }

    public function setButMarque(int $butMarque): self
    {
        $this->butMarque = $butMarque;

        return $this;
    }

    public function getButConcede(): ?int
    {
        return $this->butConcede;
    }

    public function setButConcede(int $butConcede): self
    {
        $this->butConcede = $butConcede;

        return $this;
    }

    public function getDiffBut(): ?int
    {
        return $this->diffBut;
    }

    public function setDiffBut(int $diffBut): self
    {
        $this->diffBut = $diffBut;

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

    public function getSaison(): ?Saison
    {
        return $this->saison;
    }

    public function setSaison(?Saison $saison): self
    {
        $this->saison = $saison;

        return $this;
    }

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): self
    {
        $this->competition = $competition;

        return $this;
    }


}
