<?php

namespace AppBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediaKsc
 *
 * @ORM\Table(name="media_ksc", indexes={@ORM\Index(name="FK1_user", columns={"id_user"})})
 * @ORM\Entity
 */
class MediaKsc
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="subhead", type="string", length=255, nullable=false)
     */
    private $subhead;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=30, nullable=false)
     */
    private $format;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", length=100, nullable=false)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="duration", type="string", length=100, nullable=false)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="url_LD", type="string", length=255, nullable=false)
     */
    private $urlLd;

    /**
     * @var string
     *
     * @ORM\Column(name="url_thumb", type="string", length=255, nullable=false)
     */
    private $urlThumb;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=255, nullable=false)
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="gallery", type="string", length=255, nullable=false)
     */
    private $gallery;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="date", nullable=false)
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_object", type="date", nullable=false)
     */
    private $dateObject;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=10, nullable=false)
     */
    private $color;

    /**
     * @var integer
     *
     * @ORM\Column(name="resolution", type="integer", nullable=true)
     */
    private $resolution;

    /**
     * @var string
     *
     * @ORM\Column(name="external_url", type="string", length=255, nullable=true)
     */
    private $externalUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="copy", type="string", length=255, nullable=false)
     */
    private $copy;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=30, nullable=false)
     */
    private $state = '1';

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;



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
     * Set name
     *
     * @param string $name
     *
     * @return MediaKsc
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set subhead
     *
     * @param string $subhead
     *
     * @return MediaKsc
     */
    public function setSubhead($subhead)
    {
        $this->subhead = $subhead;

        return $this;
    }

    /**
     * Get subhead
     *
     * @return string
     */
    public function getSubhead()
    {
        return $this->subhead;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return MediaKsc
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return MediaKsc
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set size
     *
     * @param string $size
     *
     * @return MediaKsc
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set duration
     *
     * @param string $duration
     *
     * @return MediaKsc
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return MediaKsc
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set urlLd
     *
     * @param string $urlLd
     *
     * @return MediaKsc
     */
    public function setUrlLd($urlLd)
    {
        $this->urlLd = $urlLd;

        return $this;
    }

    /**
     * Get urlLd
     *
     * @return string
     */
    public function getUrlLd()
    {
        return $this->urlLd;
    }

    /**
     * Set urlThumb
     *
     * @param string $urlThumb
     *
     * @return MediaKsc
     */
    public function setUrlThumb($urlThumb)
    {
        $this->urlThumb = $urlThumb;

        return $this;
    }

    /**
     * Get urlThumb
     *
     * @return string
     */
    public function getUrlThumb()
    {
        return $this->urlThumb;
    }

    /**
     * Set tags
     *
     * @param string $tags
     *
     * @return MediaKsc
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set gallery
     *
     * @param string $gallery
     *
     * @return MediaKsc
     */
    public function setGallery($gallery)
    {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * Get gallery
     *
     * @return string
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return MediaKsc
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return MediaKsc
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateObject
     *
     * @param \DateTime $dateObject
     *
     * @return MediaKsc
     */
    public function setDateObject($dateObject)
    {
        $this->dateObject = $dateObject;

        return $this;
    }

    /**
     * Get dateObject
     *
     * @return \DateTime
     */
    public function getDateObject()
    {
        return $this->dateObject;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return MediaKsc
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set resolution
     *
     * @param integer $resolution
     *
     * @return MediaKsc
     */
    public function setResolution($resolution)
    {
        $this->resolution = $resolution;

        return $this;
    }

    /**
     * Get resolution
     *
     * @return integer
     */
public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * Set externalUrl
     *
     * @param string $externalUrl
     *
     * @return MediaKsc
     */
    public function setExternalUrl($externalUrl)
    {
        $this->externalUrl = $externalUrl;

        return $this;
    }

    /**
     * Get externalUrl
     *
     * @return string
     */
    public function getExternalUrl()
    {
        return $this->externalUrl;
    }

    /**
     * Set copy
     *
     * @param string $copy
     *
     * @return MediaKsc
     */
    public function setCopy($copy)
    {
        $this->copy = $copy;

        return $this;
    }

    /**
     * Get copy
     *
     * @return string
     */
    public function getCopy()
    {
        return $this->copy;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return MediaKsc
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     *
     * @return MediaKsc
     */
    public function setIdUser(\AppBundle\Entity\User $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
	
	
	
	
	
	
	
	
	
}
