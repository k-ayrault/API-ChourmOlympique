<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JoueurDuJour
 *
 * @ORM\Table(name="joueur_du_jour", indexes={@ORM\Index(name="IDX_1C8D0122A9E2D76C", columns={"joueur_id"})})
 * @ORM\Entity
 */
class JoueurDuJour
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

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
