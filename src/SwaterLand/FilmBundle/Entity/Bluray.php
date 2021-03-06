<?php

namespace SwaterLand\FilmBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Tests\StringableObject;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Bluray
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SwaterLand\FilmBundle\Entity\BlurayRepository")
 */
class Bluray
{
    /**
     * @ORM\ManyToMany(targetEntity="SwaterLand\GenreBundle\Entity\Genre")
     */
    private $genres;

    /**
     * @ORM\ManyToMany(targetEntity="SwaterLand\ActeurBundle\Entity\Acteur")
     * @ORM\JoinTable(name="bluray_acteur")
     */
    private $acteurs;

    /**
     * @ORM\ManyToMany(targetEntity="SwaterLand\RealisateurBundle\Entity\Realisateur")
     */
    private $realisateurs;

    /**
     * @ORM\ManyToMany(targetEntity="SwaterLand\OrigineBundle\Entity\Origine")
     */
    private $origines;

    /**
     * @ORM\OneToMany(targetEntity="SwaterLand\CommentaireBundle\Entity\Commentaire", mappedBy="bluraysid")
     */
    private $commentaires;

    public function __construct() {
        $this->updatedate = new \Datetime();
    }

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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer")
     */
    private $duree;

    /**
     * @var \boolean
     *
     * @ORM\Column(name="exclu", type="boolean")
     */
    private $exclu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedate", type="datetime", nullable=true)
     */
    private $updatedate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="synopsis", type="text")
     */
    private $synopsis;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string")
     */
    private $lien;
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
     * Set nom
     *
     * @param string $nom
     * @return Bluray
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Bluray
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     * @return Bluray
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set exclu
     *
     * @param string $exclu
     * @return Bluray
     */
    public function setExclu($exclu)
    {
        $this->exclu = $exclu;

        return $this;
    }

    /**
     * Get exclu
     *
     * @return boolean
     */
    public function getExclu()
    {
        return $this->exclu;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Bluray
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
     * Set synopsis
     *
     * @param string $synopsis
     * @return Bluray
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get synopsis
     *
     * @return String
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Add genres
     *
     * @param \SwaterLand\GenreBundle\Entity\Genre $genres
     * @return Bluray
     */
    public function addGenre(\SwaterLand\GenreBundle\Entity\Genre $genres)
    {
        $this->genres[] = $genres;

        return $this;
    }

    /**
     * Remove genres
     *
     * @param \SwaterLand\GenreBundle\Entity\Genre $genres
     */
    public function removeGenre(\SwaterLand\GenreBundle\Entity\Genre $genres)
    {
        $this->genres->removeElement($genres);
    }

    /**
     * Get genres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGenres()
    {
        return $this->genres;
    }
    /**
     * Set genres
     *
     * @param \Doctrine\Common\Collections\Collection $genres
     */
    public function setGenres(\SwaterLand\GenreBundle\Entity\Genre $genres)
    {
        $this->genres = $genres;
    }

    /**
     * Add acteurs
     *
     * @param \SwaterLand\ActeurBundle\Entity\Acteur $acteurs
     * @return Bluray
     */
    public function addActeur(\SwaterLand\ActeurBundle\Entity\Acteur $acteurs)
    {
        $this->acteurs[] = $acteurs;

        return $this;
    }

    /**
     * Remove acteurs
     *
     * @param \SwaterLand\ActeurBundle\Entity\Acteur $acteurs
     */
    public function removeActeur(\SwaterLand\ActeurBundle\Entity\Acteur $acteurs)
    {
        $this->acteurs->removeElement($acteurs);
    }

    /**
     * Get acteurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActeurs()
    {
        return $this->acteurs;
    }

    /**
     * Set acteurs
     *
     * @param \Doctrine\Common\Collections\Collection $acteurs
     */
    public function setActeurs(\SwaterLand\ActeurBundle\Entity\Acteur $acteurs)
    {
        $this->acteurs = $acteurs;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set lien
     * @param string $lien
     * return $lien
     */
    public function setLien($lien)
    {
        $this->lien = $lien;
    }

    /**
     * Add realisateurs
     *
     * @param \SwaterLand\RealisateurBundle\Entity\Realisateur $realisateurs
     * @return Bluray
     */
    public function addRealisateur(\SwaterLand\RealisateurBundle\Entity\Realisateur $realisateurs)
    {
        $this->realisateurs[] = $realisateurs;

        return $this;
    }

    /**
     * Remove realisateurs
     *
     * @param \SwaterLand\RealisateurBundle\Entity\Realisateur $realisateurs
     */
    public function removeRealisateur(\SwaterLand\RealisateurBundle\Entity\Realisateur $realisateurs)
    {
        $this->realisateurs->removeElement($realisateurs);
    }

    /**
     * Get realisateurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRealisateurs()
    {
        return $this->realisateurs;
    }

    /**
     * Set realisateurs
     *
     * @param \Doctrine\Common\Collections\Collection $realisateurs
     */
    public function setRealisateurs(\SwaterLand\RealisateurBundle\Entity\Realisateur $realisateurs)
    {
        $this->$realisateurs = $realisateurs;
    }

    /**
     * Add origines
     *
     * @param \SwaterLand\OrigineBundle\Entity\Origine $origines
     * @return Bluray
     */
    public function addOrigine(\SwaterLand\OrigineBundle\Entity\Origine $origines)
    {
        $this->origines[] = $origines;

        return $this;
    }

    /**
     * Remove origines
     *
     * @param \SwaterLand\OrigineBundle\Entity\Origine $origines
     */
    public function removeOrigine(\SwaterLand\OrigineBundle\Entity\Origine $origines)
    {
        $this->origines->removeElement($origines);
    }

    /**
     * Get origines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrigines()
    {
        return $this->origines;
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set commentaires
     *
     * @param \Doctrine\Common\Collections\Collection $commentaires
     */
    public function setCommentaires(\SwaterLand\CommentaireBundle\Entity\Commentaire $commentaires)
    {
        $this->commentaires = $commentaires;
    }

    /**
     * Set origines
     *
     * @param \Doctrine\Common\Collections\Collection $origines
     */
    public function setOrigines(\SwaterLand\OrigineBundle\Entity\Origine $origines)
    {
        $this->$origines = $origines;
    }

    /**
     * Set UpdateDate
     *
     * @param \DateTime $updatedate
     *
     * @return Bluray
     */
    public function setUpdateDate($updatedate) {
        $this->updatedate = $updatedate;

        return $this;
    }

    /**
     * Get UpdateDate
     *
     * @return \DateTime
     */
    public function getUpdateDate() {
        return $this->updatedate;
    }

    /**
     * @ORM\PreUpdate
     */
    public function UpdateDate() {
        $this->setUpdateDate(new \Datetime());
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
        return 'uploads/bluray';
    }

    public function __toString() {
        return $this->nom;
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