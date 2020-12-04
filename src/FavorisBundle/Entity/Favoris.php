<?php

namespace FavorisBundle\Entity;

/**
 * Favoris
 */
class Favoris
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $libelleFav;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set libelleFav
     *
     * @param string $libelleFav
     *
     * @return Favoris
     */
    public function setLibelleFav($libelleFav)
    {
        $this->libelleFav = $libelleFav;

        return $this;
    }

    /**
     * Get libelleFav
     *
     * @return string
     */
    public function getLibelleFav()
    {
        return $this->libelleFav;
    }
}

