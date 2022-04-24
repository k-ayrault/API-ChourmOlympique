<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(?string $site): self
    {
        $this->site = $site;

        return $this;
    }

    /**
     * @return Collection<int, MatchFoot>
     */
    public function getMatchFoot(): Collection
    {
        return $this->matchFoot;
    }

    public function addMatchFoot(MatchFoot $matchFoot): self
    {
        if (!$this->matchFoot->contains($matchFoot)) {
            $this->matchFoot[] = $matchFoot;
            $matchFoot->addDiffuseur($this);
        }

        return $this;
    }

    public function removeMatchFoot(MatchFoot $matchFoot): self
    {
        if ($this->matchFoot->removeElement($matchFoot)) {
            $matchFoot->removeDiffuseur($this);
        }

        return $this;
    }

}
