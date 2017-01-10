<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Advert
 *
 * @ORM\Table(name="advert", indexes={@ORM\Index(name="model_id", columns={"model_id", "department_id", "user_id"}), @ORM\Index(name="join_depart", columns={"department_id"}), @ORM\Index(name="join_user", columns={"user_id"}), @ORM\Index(name="color_id", columns={"color_id"}), @ORM\Index(name="IDX_54F1F40B7975B7E7", columns={"model_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdvertRepository")
 */
class Advert
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=250, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="prices", type="integer", nullable=false)
     */
    private $prices;

    /**
     * @var integer
     *
     * @ORM\Column(name="km", type="integer", nullable=false)
     */
    private $km;

    /**
     * @var integer
     *
     * @ORM\Column(name="years", type="integer", nullable=false)
     */
    private $years;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="photo1", type="string", length=250, nullable=false)
     */
    private $photo1;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="photo2", type="string", length=250, nullable=false)
     */
    private $photo2;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="photo3", type="string", length=250, nullable=false)
     */
    private $photo3;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Models
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Models")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     * })
     */
    private $model;

    /**
     * @var \AppBundle\Entity\Color
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Color")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="color_id", referencedColumnName="id")
     * })
     */
    private $color;

    /**
     * @var \AppBundle\Entity\users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \AppBundle\Entity\Departements
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Departements")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     * })
     */
    private $department;



    /**
     * Set title
     *
     * @param string $title
     *
     * @return Advert
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Advert
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set prices
     *
     * @param integer $prices
     *
     * @return Advert
     */
    public function setPrices($prices)
    {
        $this->prices = $prices;

        return $this;
    }

    /**
     * Get prices
     *
     * @return integer
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * Set km
     *
     * @param integer $km
     *
     * @return Advert
     */
    public function setKm($km)
    {
        $this->km = $km;

        return $this;
    }

    /**
     * Get km
     *
     * @return integer
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * Set years
     *
     * @param integer $years
     *
     * @return Advert
     */
    public function setYears($years)
    {
        $this->years = $years;

        return $this;
    }

    /**
     * Get years
     *
     * @return integer
     */
    public function getYears()
    {
        return $this->years;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Advert
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set photo1
     *
     * @param string $photo1
     *
     * @return Advert
     */
    public function setPhoto1($photo1)
    {
        $this->photo1 = $photo1;

        return $this;
    }

    /**
     * Get photo1
     *
     * @return string
     */
    public function getPhoto1()
    {
        return $this->photo1;
    }
    
     /**
     * Set photo2
     *
     * @param string $photo2
     *
     * @return Advert
     */
    public function setPhoto2($photo2)
    {
        $this->photo2 = $photo2;

        return $this;
    }

    /**
     * Get photo2
     *
     * @return string
     */
    public function getPhoto2()
    {
        return $this->photo2;
    }
    
     /**
     * Set photo3
     *
     * @param string $photo3
     *
     * @return Advert
     */
    public function setPhoto3($photo3)
    {
        $this->photo3 = $photo3;

        return $this;
    }

    /**
     * Get photo3
     *
     * @return string
     */
    public function getPhoto3()
    {
        return $this->photo3;
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
     * Set model
     *
     * @param \AppBundle\Entity\Models $model
     *
     * @return Advert
     */
    public function setModel(\AppBundle\Entity\Models $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \AppBundle\Entity\Models
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set color
     *
     * @param \AppBundle\Entity\Color $color
     *
     * @return Advert
     */
    public function setColor(\AppBundle\Entity\Color $color = null)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return \AppBundle\Entity\Color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\Users $user
     *
     * @return Advert
     */
    public function setUser(\AppBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set department
     *
     * @param \AppBundle\Entity\Departements $department
     *
     * @return Advert
     */
    public function setDepartment(\AppBundle\Entity\Departements $department = null)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return \AppBundle\Entity\Departements
     */
    public function getDepartment()
    {
        return $this->department;
    }
    
    
    public function __toString(){
        return $this->title;
    }
}
