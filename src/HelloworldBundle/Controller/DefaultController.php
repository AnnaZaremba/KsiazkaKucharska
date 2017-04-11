<?php

namespace HelloworldBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/helloworld", name="helloworld")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('ksiazkakucharska.html.twig');

    }
}
