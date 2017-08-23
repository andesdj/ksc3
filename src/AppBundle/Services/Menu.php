<?php

namespace AppBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\Container;
class Menu {
	
   protected $em;
    private $container;
    
 
    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }
	
public function kscMenu(){	
	
	
	
	$status='1';
	 $qb = $this->em->createQueryBuilder();
			 $qb->select('u')
            ->from('AppBundle:GalleryKsc', 'u')
            ->where('u.status = status')
            ->setParameter('status', '%"' . $status . '"%');
			
			
	
	return $qb->getQuery()->getResult();
	
	
	
}

	
public function reg($data){
	$response = new \Symfony\Component\HttpFoundation\Response();
	$response->setContent("Holas ".$data);
	return $response;
	
}




}