<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all user entities.
     *
     */
	
	
	
	public function loginAction(Request $request)
    {
    
    //Llamamos al servicio de autenticacion
    $authenticationUtils = $this->get('security.authentication_utils');
    // conseguir el error del login si falla
    $error = $authenticationUtils->getLastAuthenticationError();
    // ultimo nombre de usuario que se ha intentado identificar
    $lastUsername = $authenticationUtils->getLastUsername();
    
	
	 return $this->render('allmedia/index.html.twig', array (
   
                'last_username' => $lastUsername,
                'error' => $error,
            ));
    }

    public function indexAction(Request $request)
    {
		
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
		 $items_pp=5;
		 $pagination=$paginator->paginate(
				 $query,
				 $page		,
				 $items_pp
		);
		 	
	 //Llamamos al servicio de autenticacion
    $authenticationUtils = $this->get('security.authentication_utils');
    // conseguir el error del login si falla
    $error = $authenticationUtils->getLastAuthenticationError();
    // ultimo nombre de usuario que se ha intentado identificar
    $lastUsername = $authenticationUtils->getLastUsername();

	$em = $this->getDoctrine()->getManager();
	$users = $em->getRepository('AppBundle:User')->findAll();
	 return $this->render('allmedia/index.html.twig', array (
		'users' => $users,
		'error' => $error,
		'pagination' => $pagination
	));
    }

    /**
     * Creates a new user entity.
     *
     */
    public function newAction(Request $request)
    {
		$authenticationUtils = $this->get('security.authentication_utils');
        $user = new User();
        $form = $this->createForm('AppBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
			$pass=$form->get("password")->getData();
			$role = $request->request->get('role');
			
			$username=$form->get("email")->getData();
			$state="1";
			
			
			$encoder = $this->container->get('security.password_encoder');
			$newPassword = $encoder->encodePassword($user, $pass);
			$salt="";
			$user->setPassword($newPassword);
			$user->setState($state);
			$user->setRole($role);
			$user->setSalt($salt);
			
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('user_show', array('id' => $user->getId()));
        }

        return $this->render('user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a user entity.
     *
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('user/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing user entity.
     *
     */
    public function editAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('AppBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_edit', array('id' => $user->getId()));
        }

        return $this->render('user/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a user entity.
     *
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
