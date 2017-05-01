<?php
namespace AppBundle\Controller;

use AppBundle\Repository\Doctrine\KategoriaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route(service="app.login_controller")
 */
class LoginController extends Controller
{
    /** @var KategoriaRepository */
    private $kategoriaRepository;

    /**
     * @param KategoriaRepository $kategoriaRepository
     */
    public function __construct(KategoriaRepository $kategoriaRepository)
    {
        $this->kategoriaRepository = $kategoriaRepository;
    }

    /**
     * @Route("/admin", name="admin")
     * @Template()
     */
    public function zalogowanyAction()
    {
        return $this->render('@App/Login/zalogowany.html.twig', array(
            'kategorie' => $this->kategoriaRepository->getAllOrderByName(),
        ));
    }
}