<?php

namespace AppBundle\Controller;

use AppBundle\Entity\GalleryKsc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Galleryksc controller.
 *
 * @Route("gallery")
 */
class GalleryKscController extends Controller
{
    /**
     * Lists all galleryKsc entities.
     *
     * @Route("/", name="gallery_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $galleryKscs = $em->getRepository('AppBundle:GalleryKsc')->findAll();

        return $this->render('galleryksc/index.html.twig', array(
            'galleryKscs' => $galleryKscs,
        ));
    }

    /**
     * Creates a new galleryKsc entity.
     *
     * @Route("/new", name="gallery_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $galleryKsc = new Galleryksc();
        $form = $this->createForm('AppBundle\Form\GalleryKscType', $galleryKsc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($galleryKsc);
            $em->flush();

            return $this->redirectToRoute('gallery_show', array('id' => $galleryKsc->getId()));
        }

        return $this->render('galleryksc/new.html.twig', array(
            'galleryKsc' => $galleryKsc,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a galleryKsc entity.
     *
     * @Route("/{id}", name="gallery_show")
     * @Method("GET")
     */
    public function showAction(GalleryKsc $galleryKsc)
    {
        $deleteForm = $this->createDeleteForm($galleryKsc);

        return $this->render('galleryksc/show.html.twig', array(
            'galleryKsc' => $galleryKsc,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing galleryKsc entity.
     *
     * @Route("/{id}/edit", name="gallery_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, GalleryKsc $galleryKsc)
    {
        $deleteForm = $this->createDeleteForm($galleryKsc);
        $editForm = $this->createForm('AppBundle\Form\GalleryKscType', $galleryKsc);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gallery_edit', array('id' => $galleryKsc->getId()));
        }

        return $this->render('galleryksc/edit.html.twig', array(
            'galleryKsc' => $galleryKsc,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a galleryKsc entity.
     *
     * @Route("/{id}", name="gallery_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, GalleryKsc $galleryKsc)
    {
        $form = $this->createDeleteForm($galleryKsc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($galleryKsc);
            $em->flush();
        }

        return $this->redirectToRoute('gallery_index');
    }

    /**
     * Creates a form to delete a galleryKsc entity.
     *
     * @param GalleryKsc $galleryKsc The galleryKsc entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GalleryKsc $galleryKsc)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gallery_delete', array('id' => $galleryKsc->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
