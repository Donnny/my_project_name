<?php

namespace AppBundle\Controller;

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
        return $this->render('about.html.twig');
    }
    public function getAboutMessage()
    {
        $msg = "Hello, This is About";
        return new Response(
            '<html><body>Message: ' . $msg . '</body></html>'
        );
    }
}
