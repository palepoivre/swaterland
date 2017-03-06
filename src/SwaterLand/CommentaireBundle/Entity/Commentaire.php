<?php

namespace SwaterLand\CommentaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SwaterLand\CommentaireBundle\Entity\CommentaireRepository")
 */
class Commentaire
{

    /**
     * @ORM\ManyToOne(targetEntity="SwaterLand\SerieBundle\Entity\Serie", inversedBy="commentaires")
     * @ORM\JoinColumn(name="serie_id", referencedColumnName="id")
     */
    private $seriesid;

    /**
     * @ORM\ManyToOne(targetEntity="SwaterLand\FilmBundle\Entity\Dvdrip", inversedBy="commentaires")
     * @ORM\JoinColumn(name="dvdrip_id", referencedColumnName="id")
     */
    private $dvdripsid;

    /**
     * @ORM\ManyToOne(targetEntity="SwaterLand\FilmBundle\Entity\Bluray", inversedBy="commentaires")
     * @ORM\JoinColumn(name="bluray_id", referencedColumnName="id")
     */
    private $bluraysid;

    /**
     * @ORM\ManyToOne(targetEntity="SwaterLand\UserBundle\Entity\User", inversedBy="commentaires")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $usersid;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var text
     *
     * @ORM\Column(name="commentaire", type="text")
     */
    private $commentaire;

    /**
     * @var boolean
     *
     * @ORM\Column(name="validiter", type="boolean")
     */
    private $validiter;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime")
     */
    private $updated;


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
     * Set commentaire
     *
     * @param text $commentaire
     * @return Commentaire
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return text
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set validiter
     *
     * @param boolean $validiter
     * @return Commentaire
     */
    public function setValiditer($validiter)
    {
        $this->validiter = $validiter;

        return $this;
    }

    /**
     * Get validiter
     *
     * @return boolean
     */
    public function getValiditer()
    {
        return $this->validiter;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Commentaire
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set bluraysid
     *
     * @param integer $bluraysid
     * @return Commentaire
     */
    public function setBluraysid(\SwaterLand\FilmBundle\Entity\Bluray $bluraysid = null)
    {
        $this->bluraysid = $bluraysid;

        return $this;
    }

    /**
     * Get bluraysid
     *
     * @return integer
     */
    public function getBluraysid()
    {
        return $this->bluraysid;
    }

    /**
     * Set dvdripsid
     *
     * @param integer $dvdripsid
     * @return Commentaire
     */
    public function setDvdripsid(\SwaterLand\FilmBundle\Entity\Dvdrip $dvdripsid = null)
    {
        $this->dvdripsid = $dvdripsid;

        return $this;
    }

    /**
     * Get dvdripsid
     *
     * @return integer
     */
    public function getDvdripsid()
    {
        return $this->dvdripsid;
    }

    /**
     * Set seriesid
     *
     * @param integer $seriesid
     * @return Commentaire
     */
    public function setSeriesid(\SwaterLand\SerieBundle\Entity\Serie $seriesid = null)
    {
        $this->seriesid = $seriesid;

        return $this;
    }

    /**
     * Get seriesid
     *
     * @return integer
     */
    public function getSeriesid()
    {
        return $this->seriesid;
    }

    /**
     * Set usersid
     *
     * @param integer $usersid
     * @return Commentaire
     */
    public function setUsersid($usersid)
    {
        $this->usersid = $usersid;

        return $this;
    }

    /**
     * Get usersid
     *
     * @return integer
     */
    public function getUsersid()
    {
        return $this->usersid;
    }


}
