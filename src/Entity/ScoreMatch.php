<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ScoreMatch
 *
 * @ORM\Table(name="score_match")
 * @ORM\Entity
 */
class ScoreMatch
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
     * @var int
     *
     * @ORM\Column(name="buts_domicile", type="integer", nullable=false)
     */
    private $butsDomicile;

    /**
     * @var int
     *
     * @ORM\Column(name="buts_exterieur", type="integer", nullable=false)
     */
    private $butsExterieur;

    /**
     * @var bool
     *
     * @ORM\Column(name="joue", type="boolean", nullable=false)
     */
    private $joue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getButsDomicile(): ?int
    {
        return $this->butsDomicile;
    }

    public function setButsDomicile(int $butsDomicile): self
    {
        $this->butsDomicile = $butsDomicile;

        return $this;
    }

    public function getButsExterieur(): ?int
    {
        return $this->butsExterieur;
    }

    public function setButsExterieur(int $butsExterieur): self
    {
        $this->butsExterieur = $butsExterieur;

        return $this;
    }

    public function getJoue(): ?bool
    {
        return $this->joue;
    }

    public function setJoue(bool $joue): self
    {
        $this->joue = $joue;

        return $this;
    }


}
