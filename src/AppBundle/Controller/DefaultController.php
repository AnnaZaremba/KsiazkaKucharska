<?php

namespace AppBundle\Controller;

use AppBundle\Repository\Doctrine\KategoriaRepository;
use AppBundle\Repository\Doctrine\PrzepiRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route(service="app.default_controller")
 */
class DefaultController extends Controller
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
     * @Route("/", name="ksiazkakucharska")
     * @Template()
     */
    public function startAction()
    {
        return [
            'przepisyNazwa' => $this->przepiRepository->getAllOrderByName(),
            'przepisy' => $this->przepiRepository->getLast(7),
            'kategorie' => $this->kategoriaRepository->getAllOrderByName(),
        ];
    }

    /**
     * @Route("/{id}", name="przepisid", requirements={"id": "\d+"})
     * @Template()
     * @param $id
     * @return array
     */
    public function findAction($id)
    {
        return [
            'przepis' => $this->przepiRepository->getOneById($id),
            'kategorie' => $this->kategoriaRepository->getAllOrderByName(),
            'przepisy' => $this->przepiRepository->getAllOrderByName(),
            'przepisyNazwa' => $this->przepiRepository->getAllOrderByName(),
        ];
    }

    /**
     * @Route("/omnie", name="omnie")
     * @Template()
     */
    public function omnieAction()
    {
        return [
            'kategorie' => $this->kategoriaRepository->getAllOrderByName()
        ];
    }

    /**
     * @Route("/okuchni", name="okuchni")
     * @Template()
     */
    public function okuchniAction()
    {
        return [
            'kategorie' => $this->kategoriaRepository->getAllOrderByName()
        ];
    }
}