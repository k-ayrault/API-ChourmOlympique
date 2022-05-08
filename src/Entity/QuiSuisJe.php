<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuiSuisJe
 *
 * @ORM\Table(name="qui_suis_je", indexes={@ORM\Index(name="id_joueur", columns={"id_joueur"})})
 * @ORM\Entity(repositoryClass="App\Repository\QuiSuisJeRepository")
 */
class QuiSuisJe
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_utilisateur", type="string", length=15, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUtilisateur;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_joueur", referencedColumnName="id")
     * })
     */
    private $idJoueur;

    /**
     * @param string $idUtilisateur
     * @param \Joueur $idJoueur
     */
    public function __construct(string $idUtilisateur, ?Joueur $idJoueur)
    {
        $this->idUtilisateur = $idUtilisateur;
        $this->idJoueur = $idJoueur;
    }


    public function getIdUtilisateur(): ?string
    {
        return $this->idUtilisateur;
    }

    public function getIdJoueur(): ?Joueur
    {
        return $this->idJoueur;
    }

    public function setIdJoueur(?Joueur $idJoueur): self
    {
        $this->idJoueur = $idJoueur;

        return $this;
    }


}
