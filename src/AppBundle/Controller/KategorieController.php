<?php
namespace AppBundle\Controller;

use AppBundle\Repository\Doctrine\KategoriaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route(service="app.kategorie_controller")
 */
class KategorieController extends Controller
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
     * @Route("/kategoria{id}", name="kategoriaid", requirements={"id": "\d+"})
     * @Template()
     *
     * @param int $id
     * @return array
     */
    public function znajdzAction($id)
    {
        return [
            'kategoria' =>  $this->kategoriaRepository->getOneById($id),
            'przepisKategoria' => $this->kategoriaRepository->getOneById($id)->getPrzepisy(),
            'przepisy' => $this->kategoriaRepository->getOneById($id)->getPrzepisy(),
            'kategorie' =>  $this->kategoriaRepository->getAllOrderByName(),
        ];
    }
}