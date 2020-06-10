<?php

namespace LeagueManagerApp\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Competition
 *
 * @ORM\Table(name="competition", indexes={@ORM\Index(name="competition_category_id_fk", columns={"category_id"})})
 * @ORM\Entity
 */
class Competition
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
     * @ORM\Column(name="name", type="integer", nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="slug", type="integer", nullable=false)
     */
    private $slug;

    /**
     * @var int
     *
     * @ORM\Column(name="roundrobinrounds", type="integer", nullable=false)
     */
    private $roundrobinrounds;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;


}
