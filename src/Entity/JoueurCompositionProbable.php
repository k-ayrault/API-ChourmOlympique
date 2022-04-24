<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JoueurCompositionProbable
 *
 * @ORM\Table(name="joueur_composition_probable", indexes={@ORM\Index(name="IDX_8ECA1EC9A9E2D76C", columns={"joueur_id"}), @ORM\Index(name="IDX_8ECA1EC963508938", columns={"composition_probable_id"}), @ORM\Index(name="IDX_8ECA1EC9A0905086", columns={"poste_id"})})
 * @ORM\Entity
 */
class JoueurCompositionProbable
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
     * @var \CompositionProbable
     *
     * @ORM\ManyToOne(targetEntity="CompositionProbable")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="composition_probable_id", referencedColumnName="id")
     * })
     */
    private $compositionProbable;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompositionProbable(): ?CompositionProbable
    {
        return $this->compositionProbable;
    }

    public function setCompositionProbable(?CompositionProbable $compositionProbable): self
    {
        $this->compositionProbable = $compositionProbable;

        return $this;
    }

    public function getJoueur(): ?Joueur
    {
        return $this->joueur;
    }

    public function setJoueur(?Joueur $joueur): self
    {
        $this->joueur = $joueur;

        return $this;
    }

    public function getPoste(): ?PosteFormation
    {
        return $this->poste;
    }

    public function setPoste(?PosteFormation $poste): self
    {
        $this->poste = $poste;

        return $this;
    }


}
