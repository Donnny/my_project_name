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
     * @return Course
     */
    public function setCourse($cursus)
    {
        $this->course = $cursus;

        return $this;
    }

    /**
     * Get cursus
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
     * @param string $user
     * @return User
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
