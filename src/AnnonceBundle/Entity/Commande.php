<?php

namespace AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomcommande", type="string", length=255, nullable=false)
     */
    private $nomcommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="prixcommande", type="integer", nullable=false)
     */
    private $prixcommande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecommande", type="date", nullable=false)
     */
    private $datecommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantitecommande", type="integer", nullable=false)
     */
    private $quantitecommande;


}

