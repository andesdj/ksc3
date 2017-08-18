<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function loginAction(Request $request)
    {
    
    //Llamamos al servicio de autenticacion
    $authenticationUtils = $this->get('security.authentication_utils');
    // conseguir el error del login si falla
    $error = $authenticationUtils->getLastAuthenticationError();
    // ultimo nombre de usuario que se ha intentado identificar
    $lastUsername = $authenticationUtils->getLastUsername();
     
    return $this->render('AppBundle:User:login.html.twig', array(
                'last_username' => $lastUsername,
                'error' => $error,
            ));


    }
}
