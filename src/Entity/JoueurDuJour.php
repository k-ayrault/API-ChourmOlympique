<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * JoueurDuJour
 *
 * @ORM\Table(name="joueur_du_jour", indexes={@ORM\Index(name="IDX_1C8D0122A9E2D76C", columns={"joueur_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\JoueurDuJourRepository")
 */
class JoueurDuJour
{
    /**
     * @var int
     *
     * @Groups({"joueur_du_jour"})
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @Groups({"joueur_du_jour"})
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \Joueur
     *
     * @Groups({"joueur_du_jour"})
     * @ORM\ManyToOne(targetEntity="Joueur", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur_id", referencedColumnName="id")
     * })
     */
    private $joueur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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


}
