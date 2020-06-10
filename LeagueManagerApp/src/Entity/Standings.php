<?php

namespace LeagueManagerApp\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Standings
 *
 * @ORM\Table(name="standings", indexes={@ORM\Index(name="standings_season_id_fk", columns={"season_id"}), @ORM\Index(name="standings_competition_id_fk", columns={"competition_id"})})
 * @ORM\Entity
 */
class Standings
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
     * @var \Competition
     *
     * @ORM\ManyToOne(targetEntity="Competition")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="competition_id", referencedColumnName="id")
     * })
     */
    private $competition;

    /**
     * @var \Season
     *
     * @ORM\ManyToOne(targetEntity="Season")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="season_id", referencedColumnName="id")
     * })
     */
    private $season;


}
