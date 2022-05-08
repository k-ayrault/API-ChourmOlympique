<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diffuseur
 *
 * @ORM\Table(name="diffuseur")
 * @ORM\Entity
 */
class Diffuseur
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
     * @var string|null
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="site", type="string", length=255, nullable=true)
     */
    private $site;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="MatchFoot", mappedBy="diffuseur")
     */
    private $matchFoot;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->matchFoot = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
