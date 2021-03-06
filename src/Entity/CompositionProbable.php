<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CompositionProbable
 *
 * @ORM\Table(name="composition_probable", indexes={@ORM\Index(name="IDX_CA4FA6145200282E", columns={"formation_id"}), @ORM\Index(name="IDX_CA4FA61461190A32", columns={"club_id"}), @ORM\Index(name="IDX_CA4FA614478E8802", columns={"journal_id"}), @ORM\Index(name="IDX_CA4FA6142ABEACD6", columns={"match_id"})})
 * @ORM\Entity
 */
class CompositionProbable
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
     * @var \Formation
     *
     * @ORM\ManyToOne(targetEntity="Formation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="formation_id", referencedColumnName="id")
     * })
     */
    private $formation;

    /**
     * @var \Journal
     *
     * @ORM\ManyToOne(targetEntity="Journal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="journal_id", referencedColumnName="id")
     * })
     */
    private $journal;

    /**
     * @var \Club
     *
     * @ORM\ManyToOne(targetEntity="Club")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="club_id", referencedColumnName="id")
     * })
     */
    private $club;


}
