<?php

namespace SwaterLand\GenreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SwaterLand\GenreBundle\Entity\GenreRepository")
 */
class Genre
{
    /**
     * @ORM\ManyToMany(targetEntity="SwaterLand\SerieBundle\Entity\Serie", mappedBy="genres")
     */
    private $series;
    /**
     * @ORM\ManyToMany(targetEntity="SwaterLand\FilmBundle\Entity\Bluray", mappedBy="genres")
     */
    private $blurays;
    /**
     * @ORM\ManyToMany(targetEntity="SwaterLand\FilmBundle\Entity\Dvdrip", mappedBy="genres")
     */
    private $dvdrips;
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
     * @ORM\Column(name="genre", type="string", length=255)
     */
    private $genre;


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
     * Set genre
     *
     * @param string $genre
     * @return Genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Add series
     *
     * @param \SwaterLand\SerieBundle\Entity\Serie $series
     * @return Serie
     */
    public function addSeries(\SwaterLand\SerieBundle\Entity\Serie $series)
    {
        $this->series[] = $series;

        return $this;
    }

    /**
     * Remove series
     *
     * @param \SwaterLand\SerieBundle\Entity\Serie $series
     */
    public function removeSeries(\SwaterLand\SerieBundle\Entity\Serie $series)
    {
        $this->series->removeElement($series);
    }

    /**
     * Get Series
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set series
     *
     * @param \Doctrine\Common\Collections\Collection $series
     */
    public function setSeries(\SwaterLand\SerieBundle\Entity\Serie $series)
    {
        $this->Series = $series;
    }

    /**
     * Get Blurays
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBlurays()
    {
        return $this->blurays;
    }

    /**
     * Set blurays
     *
     * @param \Doctrine\Common\Collections\Collection $series
     */
    public function setBlurays(\SwaterLand\FilmBundle\Entity\Bluray $blurays)
    {
        $this->Blurays = $blurays;
    }

    /**
     * Get dvdrips
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDvdrips()
    {
        return $this->dvdrips;
    }

    /**
     * Set dvdrips
     *
     * @param \Doctrine\Common\Collections\Collection $dvdrips
     */
    public function setDvdrips(\SwaterLand\FilmBundle\Entity\Dvdrip $dvdrips)
    {
        $this->Dvdrips = $dvdrips;
    }
}
