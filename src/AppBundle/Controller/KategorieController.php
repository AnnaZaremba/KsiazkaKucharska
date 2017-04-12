<?php
namespace AppBundle\Controller;

use AppBundle\Repository\Doctrine\KategoriaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class KategorieController
 * @package AppBundle\Controller
 *
 * @Route("/kategorie")
 */
class KategorieController extends Controller
{
    /**
     * @Route("/{id}", name="kategoriaid", requirements={"id": "\d+"})
     * @Template()
     */
    public function findAction($id)
    {
        return [
            'kategoria' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getOneById($id),
            'przepisy' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getOneById($id)->getPrzepisy(),
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
        ];
    }
}