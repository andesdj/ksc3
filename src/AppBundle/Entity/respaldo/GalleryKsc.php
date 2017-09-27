<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GalleryKsc
 */
class GalleryKsc
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $initial;

    /**
     * @var string
     */
    private $gallery;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \AppBundle\Entity\GroupsKsc
     */
    private $group;


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
     * Set initial
     *
     * @param string $initial
     * @return GalleryKsc
     */
    public function setInitial($initial)
    {
        $this->initial = $initial;

        return $this;
    }

    /**
     * Get initial
     *
     * @return string 
     */
    public function getInitial()
    {
        return $this->initial;
    }

    /**
     * Set gallery
     *
     * @param string $gallery
     * @return GalleryKsc
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
     * @return GalleryKsc
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
     * Set status
     *
     * @param string $status
     * @return GalleryKsc
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set group
     *
     * @param \AppBundle\Entity\GroupsKsc $group
     * @return GalleryKsc
     */
    public function setGroup(\AppBundle\Entity\GroupsKsc $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \AppBundle\Entity\GroupsKsc 
     */
    public function getGroup()
    {
        return $this->group;
    }
}
