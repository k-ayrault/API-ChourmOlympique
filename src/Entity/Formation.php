<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity
 */
class Formation
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
     * @ORM\Column(name="intitule", type="string", length=255, nullable=false)
     */
    private $intitule;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PosteFormation", inversedBy="formation")
     * @ORM\JoinTable(name="formation_poste_formation",
     *   joinColumns={
     *     @ORM\JoinColumn(name="formation_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="poste_formation_id", referencedColumnName="id")
     *   }
     * )
     */
    private $posteFormation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->posteFormation = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
