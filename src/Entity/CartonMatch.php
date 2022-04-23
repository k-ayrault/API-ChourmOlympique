<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CartonMatch
 *
 * @ORM\Table(name="carton_match", indexes={@ORM\Index(name="IDX_7953FB862ABEACD6", columns={"match_id"}), @ORM\Index(name="IDX_7953FB86A9E2D76C", columns={"joueur_id"})})
 * @ORM\Entity
 */
class CartonMatch
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
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=255, nullable=false)
     */
    private $couleur;

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
     *   @ORM\JoinColumn(name="joueur_id", referencedColumnName="id")
     * })
     */
    private $joueur;


}
