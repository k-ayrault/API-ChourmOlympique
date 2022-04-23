<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosteFormation
 *
 * @ORM\Table(name="poste_formation")
 * @ORM\Entity
 */
class PosteFormation
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
     * @ORM\ManyToMany(targetEntity="Formation", mappedBy="posteFormation")
     */
    private $formation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->formation = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
