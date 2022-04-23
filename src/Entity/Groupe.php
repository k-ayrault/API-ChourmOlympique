<?php

namespace App\Entity;

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

}
