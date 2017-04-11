<?php

namespace AppBundle\Controller;


use AppBundle\Repository\Doctrine\KategoriaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SecurityController
 * @package AppBundle\Controller
 * @Route("/ksiazkakucharska")
 */
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render('@App/security/login.html.twig', array(
            'error' => $error,
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
        ));
    }
}