<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Factuur
 *
 * @ORM\Table(name="factuur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FactuurRepository")
 */
class Factuur
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
     * @ORM\Column(name="naam", type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="facturen")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=TRUE)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Course", inversedBy="facturen")
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id", nullable=TRUE)
     */
    private $course;


    /**
     * @var string
     *
     * @ORM\Column(name="bedrag", type="string", length=255)
     */
    private $bedrag;




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
     * Set naam
     *
     * @param string $naam
     * @return Factuur
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;

        return $this;
    }

    /**
     * Get naam
     *
     * @return string 
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * Set cursus
     *
     * @param string $cursus
     * @return Factuur
     */
    public function setCursus($cursus)
    {
        $this->cursus = $cursus;

        return $this;
    }

    /**
     * Get cursus
     *
     * @return string 
     */
    public function getCursus()
    {
        return $this->cursus;
    }

    /**
     * Set bedrag
     *
     * @param string $bedrag
     * @return Factuur
     */
    public function setBedrag($bedrag)
    {
        $this->bedrag = $bedrag;

        return $this;
    }

    /**
     * Get bedrag
     *
     * @return string
     */
    public function getBedrag()
    {
        return $this->bedrag;
    }

    /**
     * Set course
     *
     * @param string $course
     * @return Factuur
     */
    public function setCourse($course)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return string
     */
    public function getCourse()
    {
        return $this->course;
    }


    /**
     * Set user
     *
     * @param string $course
     * @return Factuur
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }


}
