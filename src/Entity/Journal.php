<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Journal
 *
 * @ORM\Table(name="journal")
 * @ORM\Entity
 */
class Journal
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


}
