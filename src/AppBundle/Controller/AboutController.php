<?php

namespace AppBundle\Controller;

use AppBundle\Entity\About;
use AppBundle\Form\AboutType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller
{
    /**
     * @Route("/about")
     */
    public function showAboutPage(Request $request)
    {
        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ) {
            $aboutData = new About();
            $form = $this->createForm(AboutType::class, $aboutData);
            //$form1 = $this->createForm(LoginuserType::class, $user);

            // 2) handle the submit (will only happen on POST)
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $aboutData->setCreatedAt(new \DateTime());

                $em = $this->getDoctrine()->getManager();
                $em->persist($aboutData);
                $em->flush();
            }
            return $this->render('about.html.twig', array('form' => $form->createView()));
        }
        else {
            $aboutData = $this->getDoctrine()
                ->getRepository('AppBundle:About')
                ->findAll();

            return $this->render('about.html.twig',array('aboutData' => $aboutData));
        }
        //return $this->render('about.html.twig');
    }

    /**
     * @Route("/editabout", name="editabout")
     */
    public function reloadPage(Request $request)
    {

    }

    public function getAboutMessage()
    {
        $msg = "Hello, This is About";
        return new Response(
            '<html><body>Message: ' . $msg . '</body></html>'
        );
    }
}
