<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regions
 *
 * @ORM\Table(name="regions")
 * @ORM\Entity
 */
class Regions
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="num_region", type="string", length=2)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numRegion;



    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Regions
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
     * Get numRegion
     *
     * @return string
     */
    public function getNumRegion()
    {
        return $this->numRegion;
    }
}
