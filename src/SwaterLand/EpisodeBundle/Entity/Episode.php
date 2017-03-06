<?php

namespace SwaterLand\EpisodeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Episode
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SwaterLand\EpisodeBundle\Entity\EpisodeRepository")
 */
class Episode
{

    /**
     * @ORM\ManyToOne(targetEntity="SwaterLand\SerieBundle\Entity\Serie", inversedBy="episodes")
     * @ORM\JoinColumn(name="serie_id", referencedColumnName="id")
     */
    private $seriesid;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="saison", type="integer")
     */
    private $saison;

    /**
     * @var integer
     *
     * @ORM\Column(name="episode", type="integer")
     */
    private $episode;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string" , length=255)
     */
    private $lien;

    /**
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * @param string $lien
     */
    public function setLien($lien)
    {
        $this->lien = $lien;
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
     * Set saison
     *
     * @param integer $saison
     * @return Episode
     */
    public function setSaison($saison)
    {
        $this->saison = $saison;

        return $this;
    }

    /**
     * Get saison
     *
     * @return integer
     */
    public function getSaison()
    {
        return $this->saison;
    }

    /**
     * Set episode
     *
     * @param integer $episode
     * @return Episode
     */
    public function setEpisode($episode)
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Get episode
     *
     * @return integer
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * Set seriesid
     *
     * @param \SwaterLand\SerieBundle\Entity\Serie $seriesid
     * @return Episode
     */
    public function setSeriesid(\SwaterLand\SerieBundle\Entity\Serie $seriesid = null)
    {
        $this->seriesid = $seriesid;

        return $this;
    }

    /**
     * Get seriesid
     *
     * @return \SwaterLand\SerieBundle\Entity\Serie 
     */
    public function getSeriesid()
    {
        return $this->seriesid;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }


    /**
     * @Assert\File(maxSize="10000000k")
     */
    public $file;

    public function getAbsoluteLien()
    {
        return null === $this->lien
            ? null
            : $this->getUploadRootDir().'/'.$this->lien;
    }

    public function getWebLien()
    {
        return null === $this->lien
            ? null
            : $this->getUploadDir().'/'.$this->lien;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/serie';
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->lien = $filename.'.'.$this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // Nous utilisons le nom de fichier original, donc il est dans la pratique
        // nécessaire de le nettoyer pour éviter les problèmes de sécurité

        // move copie le fichier présent chez le client dans le répertoire indiqué.
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->getFile()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->lien = $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsoluteLien()) {
            unlink($file);
        }
    }
}
