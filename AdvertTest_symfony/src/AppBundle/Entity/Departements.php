<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departements
 *
 * @ORM\Table(name="departements", indexes={@ORM\Index(name="FK_DEPARTEMENT_REGION", columns={"num_region"}), @ORM\Index(name="num_departement", columns={"num_departement"})})
 * @ORM\Entity
 */
class Departements
{
    /**
     * @var string
     *
     * @ORM\Column(name="num_departement", type="string", length=2, nullable=false)
     */
    private $numDepartement;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=32, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Regions
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Regions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="num_region", referencedColumnName="num_region")
     * })
     */
    private $numRegion;



    /**
     * Set numDepartement
     *
     * @param string $numDepartement
     *
     * @return Departements
     */
    public function setNumDepartement($numDepartement)
    {
        $this->numDepartement = $numDepartement;

        return $this;
    }

    /**
     * Get numDepartement
     *
     * @return string
     */
    public function getNumDepartement()
    {
        return $this->numDepartement;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Departements
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numRegion
     *
     * @param \AppBundle\Entity\Regions $numRegion
     *
     * @return Departements
     */
    public function setNumRegion(\AppBundle\Entity\Regions $numRegion = null)
    {
        $this->numRegion = $numRegion;

        return $this;
    }

    /**
     * Get numRegion
     *
     * @return \AppBundle\Entity\Regions
     */
    public function getNumRegion()
    {
        return $this->numRegion;
    }
    
     public function __toString(){
        return $this->numDepartement;
    }
}
