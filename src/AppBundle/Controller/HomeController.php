<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */

    public function showIndexPage(Request $request)
    {
        return $this->render('index.html.twig');
    }

    public function getHomeMessage()
    {
        $msg = "Hello, This is home";
        return new Response(
            '<html><body>Message: ' . $msg . '</body></html>'
        );
    }
}
