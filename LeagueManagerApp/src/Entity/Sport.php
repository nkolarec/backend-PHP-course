<?php

namespace LeagueManagerApp\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sport
 *
 * @ORM\Table(name="sport", uniqueConstraints={@ORM\UniqueConstraint(name="sport_slug_uindex", columns={"slug"}), @ORM\UniqueConstraint(name="sport_id_uindex", columns={"id"})})
 * @ORM\Entity
 */
class Sport
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


}
