<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\About;
use AppBundle\Form\AboutType;

/**
 * About controller.
 *
 * @Route("/about")
 */
class AboutController extends Controller
{
    /**
     * Lists all About entities.
     *
     * @Route("/", name="about_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $abouts = $em->getRepository('AppBundle:About')->findAll();

        return $this->render('about/index.html.twig', array(
            'abouts' => $abouts,
        ));
    }

    /**
     * Creates a new About entity.
     *
     * @Route("/new", name="about_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $about = new About();
        $form = $this->createForm('AppBundle\Form\AboutType', $about);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($about);
            $em->flush($about);

            return $this->redirectToRoute('about_index', array('id' => $about->getId()));
        }

        return $this->render('about/new.html.twig', array(
            'about' => $about,
            'form' => $form->createView(),
        ));
    }





    /**
     * Displays a form to edit an existing About entity.
     *
     * @Route("/{id}/edit", name="about_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, About $about)
    {
        $deleteForm = $this->createDeleteForm($about);
        $editForm = $this->createForm('AppBundle\Form\AboutType', $about);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($about);
            $em->flush();

            return $this->redirectToRoute('about_edit', array('id' => $about->getId()));
        }

        return $this->render('about/edit.html.twig', array(
            'about' => $about,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a About entity.
     *
     * @Route("/{id}", name="about_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, About $about)
    {
        $form = $this->createDeleteForm($about);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($about);
            $em->flush();
        }

        return $this->redirectToRoute('about_index');
    }

    /**
     * Creates a form to delete a About entity.
     *
     * @param About $about The About entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(About $about)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('about_delete', array('id' => $about->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
