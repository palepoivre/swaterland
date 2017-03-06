<?php

namespace SwaterLand\QualiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qualite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SwaterLand\QualiteBundle\Entity\QualiteRepository")
 */
class Qualite
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
     * @ORM\Column(name="Qualite", type="string", length=255)
     */
    private $qualite;


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
     * Set qualite
     *
     * @param string $qualite
     * @return Qualite
     */
    public function setQualite($qualite)
    {
        $this->qualite = $qualite;

        return $this;
    }

    /**
     * Get qualite
     *
     * @return string 
     */
    public function getQualite()
    {
        return $this->qualite;
    }
}
