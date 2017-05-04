<?php
namespace AppBundle\Controller;

use AppBundle\Form\Model\Search;
use AppBundle\Form\Type\SearchFormType;
use AppBundle\Repository\Doctrine\KategoriaRepository;
use AppBundle\Repository\Doctrine\PrzepiRepository;
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

    /** @var PrzepiRepository */
    private $przepiRepository;

    /**
     * @param KategoriaRepository $kategoriaRepository
     * @param PrzepiRepository $przepiRepository
     */
    public function __construct(KategoriaRepository $kategoriaRepository, PrzepiRepository $przepiRepository)
    {
        $this->kategoriaRepository = $kategoriaRepository;
        $this->przepiRepository = $przepiRepository;
    }

    /**
     * @param Request $request
     * @return array
     * @Route("/szukaj", name="szukaj")
     * @Template()
     */
    public function szukajAction(Request $request)
    {
        $search = new Search();
        $form = $this->createForm(SearchFormType::class, $search);
        $form->handleRequest($request);

        $przepisy = [];
        if ($form->isSubmitted() && $form->isValid()) {
            $przepisy = $this->przepiRepository->search($search->getNazwa());
        }

        return [
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
            'kategorie' => $this->kategoriaRepository->getAllOrderByName(),
            'przepisy' => $przepisy,
        ];
    }
}