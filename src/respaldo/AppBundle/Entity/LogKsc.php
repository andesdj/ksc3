<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogKsc
 */
class LogKsc
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idUser;

    /**
     * @var integer
     */
    private $idMedia;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var \DateTime
     */
    private $state;


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
     * Set idUser
     *
     * @param integer $idUser
     * @return LogKsc
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    
        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idMedia
     *
     * @param integer $idMedia
     * @return LogKsc
     */
    public function setIdMedia($idMedia)
    {
        $this->idMedia = $idMedia;
    
        return $this;
    }

    /**
     * Get idMedia
     *
     * @return integer 
     */
    public function getIdMedia()
    {
        return $this->idMedia;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return LogKsc
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
     * Set state
     *
     * @param \DateTime $state
     * @return LogKsc
     */
    public function setState($state)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return \DateTime 
     */
    public function getState()
    {
        return $this->state;
    }
}
