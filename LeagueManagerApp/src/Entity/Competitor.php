<?php

namespace LeagueManagerApp\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Competitor
 *
 * @ORM\Table(name="competitor", indexes={@ORM\Index(name="competitor_sport_id_fk", columns={"sport_id"})})
 * @ORM\Entity
 */
class Competitor
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country_iso", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $countryIso = 'NULL';

    /**
     * @var \Sport
     *
     * @ORM\ManyToOne(targetEntity="Sport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sport_id", referencedColumnName="id")
     * })
     */
    private $sport;


}
