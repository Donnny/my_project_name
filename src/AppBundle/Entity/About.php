<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * About
 *
 * @ORM\Table(name="about")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AboutRepository")
 */
class About
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="kopTitle", type="string", length=255)
     */
    private $kopTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="headTitle", type="string", length=255)
     */
    private $headTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="shortDesc", type="string", length=255)
     */
    private $shortDesc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="date")
     */
    private $createdAt;


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
     * Set kopTitle
     *
     * @param string $kopTitle
     * @return About
     */
    public function setKopTitle($kopTitle)
    {
        $this->kopTitle = $kopTitle;

        return $this;
    }

    /**
     * Get kopTitle
     *
     * @return string 
     */
    public function getKopTitle()
    {
        return $this->kopTitle;
    }

    /**
     * Set headTitle
     *
     * @param string $headTitle
     * @return About
     */
    public function setHeadTitle($headTitle)
    {
        $this->headTitle = $headTitle;

        return $this;
    }

    /**
     * Get headTitle
     *
     * @return string 
     */
    public function getHeadTitle()
    {
        return $this->headTitle;
    }

    /**
     * Set shortDesc
     *
     * @param string $shortDesc
     * @return About
     */
    public function setShortDesc($shortDesc)
    {
        $this->shortDesc = $shortDesc;

        return $this;
    }

    /**
     * Get shortDesc
     *
     * @return string 
     */
    public function getShortDesc()
    {
        return $this->shortDesc;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return About
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}
