<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubgalleryKsc
 */
class SubgalleryKsc
{
    /**
     * @var integer
     */
    private $gallery;

    /**
     * @var string
     */
    private $initial;

    /**
     * @var string
     */
    private $subgallery;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set gallery
     *
     * @param integer $gallery
     * @return SubgalleryKsc
     */
    public function setGallery($gallery)
    {
        $this->gallery = $gallery;
    
        return $this;
    }

    /**
     * Get gallery
     *
     * @return integer 
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * Set initial
     *
     * @param string $initial
     * @return SubgalleryKsc
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
     * Set subgallery
     *
     * @param string $subgallery
     * @return SubgalleryKsc
     */
    public function setSubgallery($subgallery)
    {
        $this->subgallery = $subgallery;
    
        return $this;
    }

    /**
     * Get subgallery
     *
     * @return string 
     */
    public function getSubgallery()
    {
        return $this->subgallery;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return SubgalleryKsc
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
     * @param integer $status
     * @return SubgalleryKsc
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
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
}
