<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Course;
use AppBundle\Form\CourseType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CoursesController extends Controller
{
    /**
     * @Route("/courses")
     */
    public function showCoursesPage(Request $request)
    {
        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ) {

            //array loop om te veranderen
            $courseArray = $this->getDoctrine()
                ->getRepository('AppBundle:Course')
                ->findAll();

            $array = array();

            for ($i = 0; $i < count($courseArray); $i++){
                $courseData = $courseArray[$i];
                $form = $this->createForm(CourseType::class, $courseData);

                $form->get('name')->setData($courseData->getName());
                $form->get('description')->setData($courseData->getDescription());
                $form->get('price')->setData($courseData->getPrice());
                $form->handleRequest($request);
                if ($form->isValid()) {
//                    $qb = $this->em->createQueryBuilder();
//                    $q = $qb->update('Entity\Course', 'c')
//                        ->set('c.name',$form->get('name'))
//                        ->set('c.description',$form->get('description'))
//                        ->set('c.price',$form->get('price'))
//                        ->where('c.id ='.$courseData->getId());
//                    $q->flush();
                    $em = $this->getDoctrine()->getManager();
                    $courseData->setName($form->get('name'));
                    //$em->persist($courseData);
                    $em->flush();
                }

                array_push($array, $form->createView());
            }

            $courseData = new Course();
            $form = $this->createForm(CourseType::class, $courseData);

            // 2) handle the submit (will only happen on POST)

            if ($form->isSubmitted() && $form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($courseData);
                $em->flush();
            }
            return $this->render('courses.html.twig', array('form' => $form->createView(), 'formArray' => $array));
        }
        else {
            $courseData = $this->getDoctrine()
                ->getRepository('AppBundle:Course')
                ->findAll();

            return $this->render('courses.html.twig',array('courseData' => $courseData));
        }
    }

    public function getCoursesMessage()
    {
        $msg = "Hello, This is course";
        return new Response(
            '<html><body>Message: ' . $msg . '</body></html>'
        );
    }
}
