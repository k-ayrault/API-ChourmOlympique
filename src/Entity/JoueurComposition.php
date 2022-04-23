<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JoueurComposition
 *
 * @ORM\Table(name="joueur_composition", indexes={@ORM\Index(name="IDX_6EC7101FA9E2D76C", columns={"joueur_id"}), @ORM\Index(name="IDX_6EC7101F87A2E12", columns={"composition_id"}), @ORM\Index(name="IDX_6EC7101FA0905086", columns={"poste_id"})})
 * @ORM\Entity
 */
class JoueurComposition
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
     * @var \Composition
     *
     * @ORM\ManyToOne(targetEntity="Composition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="composition_id", referencedColumnName="id")
     * })
     */
    private $composition;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur_id", referencedColumnName="id")
     * })
     */
    private $joueur;

    /**
     * @var \PosteFormation
     *
     * @ORM\ManyToOne(targetEntity="PosteFormation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="poste_id", referencedColumnName="id")
     * })
     */
    private $poste;


}
