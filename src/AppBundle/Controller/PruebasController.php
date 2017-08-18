<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PruebasController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
		$pagination="AAAAAAAA";
        // replace this example code with whatever you need
        return $this->render('pruebas/error.html.twig',
			array(
				'pagination' => $pagination));
		
		
    }
}

