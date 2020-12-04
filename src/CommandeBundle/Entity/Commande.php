<?php

namespace CommandeBundle\Entity;

/**
 * Commande
 */
class Commande
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nomcommande;

    /**
     * @var int
     */
    private $prixcommande;

    /**
     * @var \DateTime
     */
    private $datecommande;

    /**
     * @var int
     */
    private $quantitecommande;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Commande
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomcommande()
    {
        return $this->nomcommande;
    }

    /**
     * @param string $nomcommande
     * @return Commande
     */
    public function setNomcommande($nomcommande)
    {
        $this->nomcommande = $nomcommande;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrixcommande()
    {
        return $this->prixcommande;
    }

    /**
     * @param int $prixcommande
     * @return Commande
     */
    public function setPrixcommande($prixcommande)
    {
        $this->prixcommande = $prixcommande;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDatecommande()
    {
        return $this->datecommande;
    }

    /**
     * @param \DateTime $datecommande
     * @return Commande
     */
    public function setDatecommande($datecommande)
    {
        $this->datecommande = $datecommande;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantitecommande()
    {
        return $this->quantitecommande;
    }

    /**
     * @param int $quantitecommande
     * @return Commande
     */
    public function setQuantitecommande($quantitecommande)
    {
        $this->quantitecommande = $quantitecommande;
        return $this;
    }

}

