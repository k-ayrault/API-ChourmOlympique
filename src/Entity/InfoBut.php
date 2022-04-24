<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfoBut
 *
 * @ORM\Table(name="info_but", indexes={@ORM\Index(name="IDX_69DD67B690B9A1AF", columns={"passeur_id"}), @ORM\Index(name="IDX_69DD67B62ABEACD6", columns={"match_id"}), @ORM\Index(name="IDX_69DD67B659365323", columns={"buteur_id"})})
 * @ORM\Entity
 */
class InfoBut
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
     * @ORM\Column(name="minute", type="integer", nullable=false)
     */
    private $minute;

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
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="passeur_id", referencedColumnName="id")
     * })
     */
    private $passeur;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="buteur_id", referencedColumnName="id")
     * })
     */
    private $buteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinute(): ?int
    {
        return $this->minute;
    }

    public function setMinute(int $minute): self
    {
        $this->minute = $minute;

        return $this;
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

    public function getPasseur(): ?Joueur
    {
        return $this->passeur;
    }

    public function setPasseur(?Joueur $passeur): self
    {
        $this->passeur = $passeur;

        return $this;
    }

    public function getButeur(): ?Joueur
    {
        return $this->buteur;
    }

    public function setButeur(?Joueur $buteur): self
    {
        $this->buteur = $buteur;

        return $this;
    }


}
