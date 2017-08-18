<?php

namespace AppBundle\Controller;

use AppBundle\Entity\GroupsKsc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Groupsksc controller.
 *
 * @Route("groups")
 */
class GroupsKscController extends Controller
{
    /**
     * Lists all groupsKsc entities.
     *
     * @Route("/", name="groups_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groupsKscs = $em->getRepository('AppBundle:GroupsKsc')->findAll();

        return $this->render('groupsksc/index.html.twig', array(
            'groupsKscs' => $groupsKscs,
        ));
    }

    /**
     * Creates a new groupsKsc entity.
     *
     * @Route("/new", name="groups_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $groupsKsc = new Groupsksc();
        $form = $this->createForm('AppBundle\Form\GroupsKscType', $groupsKsc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupsKsc);
            $em->flush();

            return $this->redirectToRoute('groups_show', array('id' => $groupsKsc->getId()));
        }

        return $this->render('groupsksc/new.html.twig', array(
            'groupsKsc' => $groupsKsc,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a groupsKsc entity.
     *
     * @Route("/{id}", name="groups_show")
     * @Method("GET")
     */
    public function showAction(GroupsKsc $groupsKsc)
    {
        $deleteForm = $this->createDeleteForm($groupsKsc);

        return $this->render('groupsksc/show.html.twig', array(
            'groupsKsc' => $groupsKsc,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing groupsKsc entity.
     *
     * @Route("/{id}/edit", name="groups_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, GroupsKsc $groupsKsc)
    {
        $deleteForm = $this->createDeleteForm($groupsKsc);
        $editForm = $this->createForm('AppBundle\Form\GroupsKscType', $groupsKsc);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('groups_edit', array('id' => $groupsKsc->getId()));
        }

        return $this->render('groupsksc/edit.html.twig', array(
            'groupsKsc' => $groupsKsc,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a groupsKsc entity.
     *
     * @Route("/{id}", name="groups_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, GroupsKsc $groupsKsc)
    {
        $form = $this->createDeleteForm($groupsKsc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($groupsKsc);
            $em->flush();
        }

        return $this->redirectToRoute('groups_index');
    }

    /**
     * Creates a form to delete a groupsKsc entity.
     *
     * @param GroupsKsc $groupsKsc The groupsKsc entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GroupsKsc $groupsKsc)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('groups_delete', array('id' => $groupsKsc->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
