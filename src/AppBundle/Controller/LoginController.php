<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use AppBundle\Form\LoginuserType;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        //$form1 = $this->createForm(LoginuserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('index.html.twig');
        }
        //$form1->handleRequest($request);

            $authenticationUtils = $this->get('security.authentication_utils');

            // get the login error if there is one
            $error = $authenticationUtils->getLastAuthenticationError();

//            $em = $this->getDoctrine()->getManager();
//            $em->persist($user);
//            $em->flush();
//
//            // Here, "public" is the name of the firewall in your security.yml
//            $token = new UsernamePasswordToken($user, $user->getPassword(), "main", $user->getRoles());
//
//            // For older versions of Symfony, use security.context here
//            $this->get("security.token_storage")->setToken($token);
//
//            // Fire the login event
//            // Logging the user in above the way we do it doesn't do this automatically
//            $event = new InteractiveLoginEvent($request, $token);
//            $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);
        return $this->render('AppBundle:Login:login.html.twig', array('form' => $form->createView(),
        'error' => $error));
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
    }

}
