<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class AllMediaController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
	//	$Menu=$this->get("app.menu")	;
		 $a="";
		 $em = $this->getDoctrine()->getManager();
		 $dql = "SELECT e FROM AppBundle:MediaKsc e";
		 $query = $em->createQuery($dql);
		// $allmedia=$em->getRepository('AppBundle:GroupsKsc')->findAll();

		 /**
		  * @var $paginator \Knp\Componemt\Pager\Paginator
		  */
		 $paginator  = $this->get('knp_paginator');
		 $page=$request->query->getInt('page',1)	;
		 $items_pp=20;
		 $pagination=$paginator->paginate(
				 $query,
				 $page		,
				 $items_pp
		);
        // replace this example code with whatever you need
        return $this->render('allmedia/index.html.twig',
			array(
				'pagination' => $pagination,
				'kscMenu' => $this->get("app.menu")->KscMenu(),
				'kscsubMenu' => $this->get("app.menu")->KscsubMenu(),
				'kscsubLevel' => $this->get("app.menu")->KscsubLevel(),
				)
		);
	//indexAction	
    }
	
	 public function groupAction(Request $request, $id)
    {
			$em = $this->getDoctrine()->getManager();
			$query = $em->getRepository('AppBundle:MediaKsc')->findBy(array(
				'group'=>$id,
				'state'=>1
			));
		 /**
		  * @var $paginator \Knp\Componemt\Pager\Paginator
		  */
		 $paginator  = $this->get('knp_paginator');
		 $page=$request->query->getInt('page',1)	;
		 $items_pp=20;
		 $pagination=$paginator->paginate(
				 $query,
				 $page		,
				 $items_pp
		);
		 
        // replace this example code with whatever you need
        return $this->render('allmedia/index.html.twig',
			array(
				'pagination' => $pagination,
				'kscMenu' => $this->get("app.menu")->KscMenu(),
				'kscsubMenu' => $this->get("app.menu")->KscsubMenu(),
				'kscsubLevel' => $this->get("app.menu")->KscsubLevel(),
				)
		);
    }
	
	 public function galleryAction(Request $request, $id)    {
			$em = $this->getDoctrine()->getManager();
			$query = $em->getRepository('AppBundle:MediaKsc')->findBy(array(
				'gallery'=>$id,
				'state'=>1
			));
		 /**
		  * @var $paginator \Knp\Componemt\Pager\Paginator
		  */
		 $paginator  = $this->get('knp_paginator');
		 $page=$request->query->getInt('page',1)	;
		 $items_pp=20;
		 $pagination=$paginator->paginate(
				 $query,
				 $page		,
				 $items_pp
		);
 
        // replace this example code with whatever you need
        return $this->render('allmedia/index.html.twig',
			array(
				'pagination' => $pagination,
				'kscMenu' => $this->get("app.menu")->KscMenu(),
				'kscsubMenu' => $this->get("app.menu")->KscsubMenu(),
				'kscsubLevel' => $this->get("app.menu")->KscsubLevel(),
				)
		);
		//GalleryAction
    }	
		 public function subgalleryAction(Request $request, $id)    {
			$em = $this->getDoctrine()->getManager();
			$query = $em->getRepository('AppBundle:MediaKsc')->findBy(array(
				'subgallery'=>$id,
				'state'=>1
			));
		 /**
		  * @var $paginator \Knp\Componemt\Pager\Paginator
		  */
		 $paginator  = $this->get('knp_paginator');
		 $page=$request->query->getInt('page',1)	;
		 $items_pp=20;
		 $pagination=$paginator->paginate(
				 $query,
				 $page		,
				 $items_pp
		);
 
        // replace this example code with whatever you need
        return $this->render('allmedia/index.html.twig',
			array(
				'pagination' => $pagination,
				'kscMenu' => $this->get("app.menu")->KscMenu(),
				'kscsubMenu' => $this->get("app.menu")->KscsubMenu(),
				'kscsubLevel' => $this->get("app.menu")->KscsubLevel(),
				)
		);
		//GalleryAction
    }
	public function resultsAction(Request $request)
    {
		$a="";
		 $em = $this->getDoctrine()->getManager();
		 $search = stripslashes(strip_tags($request->get('kscSearch')));
			if ($search){
			$repository = $this->getDoctrine()
				->getRepository('AppBundle:MediaKsc');
			
			$dql=$repository->createQueryBuilder('e')
						->where('e.name LIKE :name')
						->orWhere('e.subhead LIKE :subhead')
                        ->orWhere('e.tags LIKE :tags')
						->orWhere('e.copy LIKE :copy')
                        ->andWhere('e.state = :state')
                        ->setParameter('name', '%' . $search . '%')
						->setParameter('subhead', '%' . $search . '%')
                        ->setParameter('tags', '%' . $search . '%')
						->setParameter('copy', '%' . $search . '%')
                        ->setParameter('state', '1')
						->getQuery();
				
			$query=$dql->getResult();			
		 
		 } else {
			$repository = $this->getDoctrine()
				->getRepository('AppBundle:MediaKsc');
			$dql=$repository->createQueryBuilder('e')
						->Where('e.state = :state')
                        ->setParameter('state', '1')
						->getQuery();
				
			$query=$dql->getResult();				
		 }
		// $allmedia=$em->getRepository('AppBundle:GroupsKsc')->findAll();
		 /**
		  * @var $paginator \Knp\Componemt\Pager\Paginator
		  */
		 $paginator  = $this->get('knp_paginator');
		 $page=$request->query->getInt('page',1)	;
		 $items_pp=20;
		 $pagination=$paginator->paginate(
				 $query,
				 $page		,
				 $items_pp
		);
        // replace this example code with whatever you need
        return $this->render('allmedia/index.html.twig',
			array(
				'pagination' => $pagination));
		
		
    }
	
	
	
	
	
}
