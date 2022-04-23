<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Composition
 *
 * @ORM\Table(name="composition", indexes={@ORM\Index(name="IDX_C7F434761190A32", columns={"club_id"}), @ORM\Index(name="IDX_C7F43472ABEACD6", columns={"match_id"}), @ORM\Index(name="IDX_C7F43475200282E", columns={"formation_id"})})
 * @ORM\Entity
 */
class Composition
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
     * @var \Formation
     *
     * @ORM\ManyToOne(targetEntity="Formation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="formation_id", referencedColumnName="id")
     * })
     */
    private $formation;


}
