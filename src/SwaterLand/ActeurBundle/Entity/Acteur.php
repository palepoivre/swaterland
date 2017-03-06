<?php

namespace SwaterLand\ActeurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acteur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SwaterLand\ActeurBundle\Entity\ActeurRepository")
 */
class Acteur
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="acteur", type="string", length=255)
     */
    private $acteur;


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
     * Set acteur
     *
     * @param string $acteur
     * @return Acteur
     */
    public function setActeur($acteur)
    {
        $this->acteur = $acteur;

        return $this;
    }

    /**
     * Get acteur
     *
     * @return string 
     */
    public function getActeur()
    {
        return $this->acteur;
    }
}
