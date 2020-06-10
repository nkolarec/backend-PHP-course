<?php

namespace LeagueManagerApp\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Match
 *
 * @ORM\Table(name="match", indexes={@ORM\Index(name="match_competition_id_fk", columns={"competition_id"}), @ORM\Index(name="match_competitor_id_fk_2", columns={"awaycompetitor_id"}), @ORM\Index(name="match_competitor_id_fk", columns={"homecompetitor_id"}), @ORM\Index(name="match_season_id_fk", columns={"season_id"})})
 * @ORM\Entity
 */
class Match
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
     * @ORM\Column(name="startdate", type="date", nullable=false)
     */
    private $startdate;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    /**
     * @var int|null
     *
     * @ORM\Column(name="winnercode", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $winnercode = 'NULL';

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
     * @var \Competitor
     *
     * @ORM\ManyToOne(targetEntity="Competitor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="homecompetitor_id", referencedColumnName="id")
     * })
     */
    private $homecompetitor;

    /**
     * @var \Competitor
     *
     * @ORM\ManyToOne(targetEntity="Competitor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="awaycompetitor_id", referencedColumnName="id")
     * })
     */
    private $awaycompetitor;

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
