<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Models
 *
 * @ORM\Table(name="models", indexes={@ORM\Index(name="brand_id", columns={"brand_id"})})
 * @ORM\Entity
 */
class Models
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=125, nullable=false)
     */
    private $name = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Brands
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Brands")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="brand_id", referencedColumnName="id")
     * })
     */
    private $brand;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Models
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * Set brand
     *
     * @param \AppBundle\Entity\Brands $brand
     *
     * @return Models
     */
    public function setBrand(\AppBundle\Entity\Brands $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \AppBundle\Entity\Brands
     */
    public function getBrand()
    {
        return $this->brand;
    }
    
    public function __toString(){
        return $this->name;
    }
}
