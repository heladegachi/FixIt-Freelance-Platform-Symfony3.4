<?php

namespace AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce", indexes={@ORM\Index(name="categories_an_2", columns={"categories_an"})})
 * @ORM\Entity
 */
class Annonce
{
    /**
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
     * @return int
     */
    public function getCodePos()
    {
        return $this->codePos;
    }

    /**
     * @param int $codePos
     */
    public function setCodePos($codePos)
    {
        $this->codePos = $codePos;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getTypeAn()
    {
        return $this->typeAn;
    }

    /**
     * @param string $typeAn
     */
    public function setTypeAn($typeAn)
    {
        $this->typeAn = $typeAn;
    }

    /**
     * @return string
     */
    public function getTitreAn()
    {
        return $this->titreAn;
    }

    /**
     * @param string $titreAn
     */
    public function setTitreAn($titreAn)
    {
        $this->titreAn = $titreAn;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getTypeTarif()
    {
        return $this->typeTarif;
    }

    /**
     * @param string $typeTarif
     */
    public function setTypeTarif($typeTarif)
    {
        $this->typeTarif = $typeTarif;
    }

    /**
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param int $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return \DateTime
     */
    public function getDateAn()
    {
        return $this->dateAn;
    }

    /**
     * @param \DateTime $dateAn
     */
    public function setDateAn($dateAn)
    {
        $this->dateAn = $dateAn;
    }

    /**
     * @return \Categorieannonce
     */
    public function getCategoriesAn()
    {
        return $this->categoriesAn;
    }

    /**
     * @param \Categorieannonce $categoriesAn
     */
    public function setCategoriesAn($categoriesAn)
    {
        $this->categoriesAn = $categoriesAn;
    }
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_pos", type="integer", nullable=false)
     */
    private $codePos;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="type_an", type="string", length=255, nullable=false)
     */
    private $typeAn;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_an", type="string", length=255, nullable=false)
     */
    private $titreAn;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="type_tarif", type="string", length=255, nullable=false)
     */
    private $typeTarif;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="blob", length=65535, nullable=false)
     */
    private $photo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_an", type="date", nullable=false)
     */
    private $dateAn;

    /**
     * @var \Categorieannonce
     *
     * @ORM\ManyToOne(targetEntity="Categorieannonce")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categories_an", referencedColumnName="ID")
     * })
     */
    private $categoriesAn;


}

