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


}
