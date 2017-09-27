<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubgalleryKsc
 *
 * @ORM\Table(name="subgallery_ksc")
 * @ORM\Entity
 */
class SubgalleryKsc
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
     * @var integer
     *
     * @ORM\Column(name="gallery", type="integer", nullable=false)
     */
    private $gallery;

    /**
     * @var string
     *
     * @ORM\Column(name="initial", type="string", length=50, nullable=false)
     */
    private $initial;

    /**
     * @var string
     *
     * @ORM\Column(name="subgallery", type="string", length=255, nullable=false)
     */
    private $subgallery;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;



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
}
