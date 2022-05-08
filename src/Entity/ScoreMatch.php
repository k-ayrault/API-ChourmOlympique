<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ScoreMatch
 *
 * @ORM\Table(name="score_match")
 * @ORM\Entity
 */
class ScoreMatch
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
     * @var int
     *
     * @ORM\Column(name="buts_domicile", type="integer", nullable=false)
     */
    private $butsDomicile;

    /**
     * @var int
     *
     * @ORM\Column(name="buts_exterieur", type="integer", nullable=false)
     */
    private $butsExterieur;

    /**
     * @var bool
     *
     * @ORM\Column(name="joue", type="boolean", nullable=false)
     */
    private $joue;


}
