<?php
namespace AppBundle\Controller;

use AppBundle\Repository\Doctrine\KategoriaRepository;
use AppBundle\Repository\Doctrine\PrzepiRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="ksiazkakucharska")
     * @Template()
     */
    public function startAction(Request $request)
    {
        return [
            'przepisy' => (new PrzepiRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
        ];
    }

    /**
     * @Route("/{id}", name="przepisid", requirements={"id": "\d+"})
     * @Template()
     */
    public function findAction($id)
    {
        return [
            'przepis' => (new PrzepiRepository($this->getDoctrine()->getManager()))->getOneById($id),
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
            'przepisy' => (new PrzepiRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
        ];
    }

    /**
     * @Route("/omnie", name="omnie")
     * @Template()
     */
    public function omnieAction(Request $request)
    {
        return [
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName()
        ];
    }

    /**
     * @Route("/okuchni", name="okuchni")
     * @Template()
     */
    public function okuchniAction(Request $request)
    {
        return [
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName()
        ];
    }
}