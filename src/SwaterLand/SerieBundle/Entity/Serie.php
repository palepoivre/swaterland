<?php

namespace SwaterLand\SerieBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Serie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SwaterLand\SerieBundle\Entity\SerieRepository")
 */
class Serie
{
    /**
     * @ORM\ManyToMany(targetEntity="SwaterLand\GenreBundle\Entity\Genre", inversedBy="series")
     * @ORM\JoinTable(name="serie_genre")
     */
    private $genres;

    /**
     * @ORM\ManyToMany(targetEntity="SwaterLand\ActeurBundle\Entity\Acteur", inversedBy="series")
     */
    private $acteurs;

    /**
     * @ORM\ManyToMany(targetEntity="SwaterLand\RealisateurBundle\Entity\Realisateur", inversedBy="series")
     */
    private $realisateurs;

    /**
     * @ORM\ManyToMany(targetEntity="SwaterLand\OrigineBundle\Entity\Origine", inversedBy="series")
     */
    private $origines;

    /**
     * @ORM\OneToMany(targetEntity="SwaterLand\CommentaireBundle\Entity\Commentaire", mappedBy="seriesid")
     */
    private $commentaires;

    /**
     * @ORM\OneToMany(targetEntity="SwaterLand\EpisodeBundle\Entity\Episode", mappedBy="seriesid")
     */
    private $episodes;

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
     * @ORM\Column(name="nomannonce", type="string", length=255)
     */
    private $nomannonce;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="saison", type="integer")
     */
    private $saison;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer")
     */
    private $duree;

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
     * @return Serie
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
     * @return Serie
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
     * Set saison
     *
     * @param integer $saison
     * @return Serie
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
     * Set duree
     *
     * @param integer $duree
     * @return Serie
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
     * Set date
     *
     * @param \DateTime $date
     * @return Serie
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
     * @param text $synopsis
     * @return Serie
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get synopsis
     *
     * @return string
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Add genres
     *
     * @param \SwaterLand\GenreBundle\Entity\Genre $genres
     * @return string
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
     * @return Serie
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
     * Add realisateurs
     *
     * @param \SwaterLand\RealisateurBundle\Entity\Realisateur $realisateurs
     * @return Serie
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
        $this->realisateurs = $realisateurs;
    }

    /**
     * Add origines
     *
     * @param \SwaterLand\OrigineBundle\Entity\Origine $origines
     * @return Serie
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
     * Set origines
     *
     * @param \Doctrine\Common\Collections\Collection $origines
     */
    public function setOrigines(\SwaterLand\OrigineBundle\Entity\Origine $origines)
    {
        $this->origines = $origines;
    }

    /**
     * Set episodes
     *
     * @param \SwaterLand\EpisodeBundle\Entity\Episode $episodes
     * @return Serie
     */
    public function setEpisodes(\SwaterLand\EpisodeBundle\Entity\Episode $episodes = null)
    {
        $this->episodes = $episodes;

        return $this;
    }

    /**
     * Get episodes
     *
     * @return \SwaterLand\episodeBundle\Entity\Episode
     */
    public function getEpisodes()
    {
        return $this->episodes;
    }

    /**
     * Set UpdateDate
     *
     * @param \DateTime $updatedate
     *
     * @return Serie
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
     * @return string
     */
    public function getNomannonce()
    {
        return $this->nomannonce;
    }

    /**
     * @param string $nomannonce
     */
    public function setNomannonce($nomannonce)
    {
        $this->nomannonce = $nomannonce;
    }

    public function __toString() {
        return $this->nom;
    }

}
