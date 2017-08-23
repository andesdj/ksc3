<?php

namespace AppBundle\Services;
class Menu {
    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }
    public function KscsubMenu() {        
        //return $kscMenu = $this->em->getRepository('AppBundle:GalleryKsc')->findBy(array('status'=>'1'));
        // return $kscMenu = $this->em->getRepository('AppBundle:GalleryKsc')->findAll();
		return $kscMenu = $this->em->getRepository('AppBundle:GalleryKsc')->findBy(array('status'=>'1'));
        
    }
    public function KscMenu() {
        return $kscMenu = $this->em->getRepository('AppBundle:GroupsKsc')->findBy(array('status'=>'1'));
    }
}