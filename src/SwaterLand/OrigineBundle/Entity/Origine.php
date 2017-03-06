<?php

namespace SwaterLand\OrigineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Origine
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SwaterLand\OrigineBundle\Entity\OrigineRepository")
 */
class Origine
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
     * @ORM\Column(name="origine", type="string", length=255)
     */
    private $origine;


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
     * Set origine
     *
     * @param string $origine
     * @return Origine
     */
    public function setOrigine($origine)
    {
        $this->origine = $origine;

        return $this;
    }

    /**
     * Get origine
     *
     * @return string 
     */
    public function getOrigine()
    {
        return $this->origine;
    }
}
