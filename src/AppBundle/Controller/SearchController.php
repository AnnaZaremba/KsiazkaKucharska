<?php
namespace AppBundle\Controller;

use AppBundle\Form\Model\Search;
use AppBundle\Form\Type\SearchFormType;
use AppBundle\Repository\Doctrine\KategoriaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route(service="app.search_controller")
 */

class SearchController extends Controller
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
     * @param Request $request
     * @return array
     * @Route("/szukaj", name="szukaj")
     * @Template()
     */

    public function szukajAction(Request $request)
    {
        $szukaj = new Search();

        $form = $this->createForm(SearchFormType::class, $szukaj);

        $form->handleRequest($request);

        return [
            $this->redirectToRoute('szukaj'),
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
            'szukaj' => $szukaj,
            'kategorie' => $this->kategoriaRepository->getAllOrderByName(),
        ];
    }
}