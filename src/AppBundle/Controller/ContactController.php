<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    /**
     * @Route("/contact")
     */
    public function showContactPage(Request $request)
    {
        return $this->render('contact.html.twig');
    }
    public function getContactMessage()
    {
        $msg = "Hello, This is Contact";
        return new Response(
            '<html><body>Message: ' . $msg . '</body></html>'
        );
    }
}
