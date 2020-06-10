<?php

namespace LeagueManagerApp\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Standingsrow
 *
 * @ORM\Table(name="standingsrow", indexes={@ORM\Index(name="standingsrow_standings_id_fk", columns={"standings_id"}), @ORM\Index(name="standingsrow_competitor_id_fk", columns={"competitor_id"})})
 * @ORM\Entity
 */
class Standingsrow
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
     * @ORM\Column(name="matches", type="integer", nullable=false)
     */
    private $matches;

    /**
     * @var int
     *
     * @ORM\Column(name="wins", type="integer", nullable=false)
     */
    private $wins = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="loses", type="integer", nullable=false)
     */
    private $loses = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="scoresfor", type="integer", nullable=false)
     */
    private $scoresfor = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="scoresagainst", type="integer", nullable=false)
     */
    private $scoresagainst = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="draws", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $draws = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="points", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $points = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="percentage", type="float", precision=10, scale=0, nullable=true, options={"default"="NULL"})
     */
    private $percentage = 'NULL';

    /**
     * @var \Competitor
     *
     * @ORM\ManyToOne(targetEntity="Competitor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="competitor_id", referencedColumnName="id")
     * })
     */
    private $competitor;

    /**
     * @var \Standings
     *
     * @ORM\ManyToOne(targetEntity="Standings")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="standings_id", referencedColumnName="id")
     * })
     */
    private $standings;


}
