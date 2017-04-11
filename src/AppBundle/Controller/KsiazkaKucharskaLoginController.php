<?php
namespace AppBundle\Controller;

use AppBundle\Repository\Doctrine\KategoriaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class KsiazkaKucharskaLoginController
 * @package AppBundle\Controller
 * @Route("/ksiazkakucharska")
 */
class KsiazkaKucharskaLoginController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     * @Template()
     */
    public function zalogowanyAction()
    {
        return $this->render('@App/KsiazkaKucharskaLogin/zalogowany.html.twig', array(
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
        ));
    }
}