<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur")
 * @ORM\Entity
 */
class Joueur
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="naissance", type="date", nullable=false)
     */
    private $naissance;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=false)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=255, nullable=false)
     */
    private $poste;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Groupe", mappedBy="joueur")
     */
    private $groupe;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Pays", inversedBy="joueur")
     * @ORM\JoinTable(name="joueur_pays",
     *   joinColumns={
     *     @ORM\JoinColumn(name="joueur_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="pays_id", referencedColumnName="id")
     *   }
     * )
     */
    private $pays;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groupe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pays = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
