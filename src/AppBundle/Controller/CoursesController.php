<?php

namespace AppBundle\Controller;

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
        return $this->render('courses.html.twig');
    }

    public function getCoursesMessage()
    {
        $msg = "Hello, This is course";
        return new Response(
            '<html><body>Message: ' . $msg . '</body></html>'
        );
    }
}
