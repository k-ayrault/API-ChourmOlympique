<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * MatchFoot
 *
 * @ORM\Table(name="match_foot", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_A8E088E112EB0A51", columns={"score_id"})}, indexes={@ORM\Index(name="IDX_A8E088E195715F7D", columns={"domicile_id"}), @ORM\Index(name="IDX_A8E088E1A7F59570", columns={"exterieur_id"}), @ORM\Index(name="IDX_A8E088E17B39D312", columns={"competition_id"}), @ORM\Index(name="IDX_A8E088E1F965414C", columns={"saison_id"})})
 * @ORM\Entity
 */
class MatchFoot
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
     * @var string
     *
     * @ORM\Column(name="journee", type="string", length=255, nullable=false)
     */
    private $journee;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_heure", type="datetime", nullable=true)
     */
    private $dateHeure;

    /**
     * @var \ScoreMatch
     *
     * @ORM\ManyToOne(targetEntity="ScoreMatch")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="score_id", referencedColumnName="id")
     * })
     */
    private $score;

    /**
     * @var \Club
     *
     * @ORM\ManyToOne(targetEntity="Club")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="domicile_id", referencedColumnName="id")
     * })
     */
    private $domicile;

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

    /**
     * @var \Club
     *
     * @ORM\ManyToOne(targetEntity="Club")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="exterieur_id", referencedColumnName="id")
     * })
     */
    private $exterieur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Diffuseur", inversedBy="matchFoot")
     * @ORM\JoinTable(name="match_foot_diffuseur",
     *   joinColumns={
     *     @ORM\JoinColumn(name="match_foot_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="diffuseur_id", referencedColumnName="id")
     *   }
     * )
     */
    private $diffuseur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->diffuseur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJournee(): ?string
    {
        return $this->journee;
    }

    public function setJournee(string $journee): self
    {
        $this->journee = $journee;

        return $this;
    }

    public function getDateHeure(): ?\DateTimeInterface
    {
        return $this->dateHeure;
    }

    public function setDateHeure(?\DateTimeInterface $dateHeure): self
    {
        $this->dateHeure = $dateHeure;

        return $this;
    }

    public function getScore(): ?ScoreMatch
    {
        return $this->score;
    }

    public function setScore(?ScoreMatch $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getDomicile(): ?Club
    {
        return $this->domicile;
    }

    public function setDomicile(?Club $domicile): self
    {
        $this->domicile = $domicile;

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

    public function getExterieur(): ?Club
    {
        return $this->exterieur;
    }

    public function setExterieur(?Club $exterieur): self
    {
        $this->exterieur = $exterieur;

        return $this;
    }

    /**
     * @return Collection<int, Diffuseur>
     */
    public function getDiffuseur(): Collection
    {
        return $this->diffuseur;
    }

    public function addDiffuseur(Diffuseur $diffuseur): self
    {
        if (!$this->diffuseur->contains($diffuseur)) {
            $this->diffuseur[] = $diffuseur;
        }

        return $this;
    }

    public function removeDiffuseur(Diffuseur $diffuseur): self
    {
        $this->diffuseur->removeElement($diffuseur);

        return $this;
    }

}
