<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Przepis as PrzepisEntity;
use AppBundle\Form\Model\Przepis;
use AppBundle\Form\Type\PrzepisType;
use AppBundle\Repository\Doctrine\KategoriaRepository;
use AppBundle\Repository\Doctrine\PrzepiRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(service="app.dodaj_przepis_controller")
 */
class DodajPrzepisController extends Controller
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
     * @Route("/dodajprzepis", name="dodajprzepis")
     * @Template()
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function dodajPrzepisAction(Request $request)
    {
        $przepis = new Przepis();
        $form = $this->createForm(PrzepisType::class, $przepis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $file */
            $file = $przepis->getZdjecie();

            $przepisEntity = $this->przepiRepository->save($przepis);

            //np: 1.jpg
            $filename = $przepisEntity->getId() . '.' . $file->guessExtension();

            $file->move($this->getParameter('zdjecia_przepisow'), $filename);

            $przepisEntity->setZdjecie($filename);
            $this->przepiRepository->updateEntity($przepisEntity);

            return $this->redirectToRoute('dodajprzepis');
        }

        $find = $this->getDoctrine()
            ->getRepository('AppBundle:Przepis')
            ->findAll();

        return [
            'form' => $form->createView(),
            'przepis' => $przepis,
            'find' => $find,
            'kategorie' =>  $this->kategoriaRepository->getAllOrderByName(),
            'przepisy' => $this->przepiRepository->getAllOrderByName(),
        ];
    }

    /**
     * @Route("/usunprzepis", name="usunprzepis")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');

        $this->przepiRepository->delete($id);

        return $this->redirectToRoute('dodajprzepis');
    }

    /**
     * @Route("/edytujprzepis", name="edytujprzepis")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request)
    {
        $id = $request->get('id');
        $przepis = new Przepis();

        if (isset($id)) {
            /** @var PrzepisEntity $przepisBaza */
            $przepisBaza = $this->getDoctrine()
                ->getRepository('AppBundle:Przepis')
                ->find($id);

            $przepis->setId($przepisBaza->getId());
            $przepis->setNazwa($przepisBaza->getNazwa());
            $przepis->setZdjecie($przepisBaza->getZdjecie());
            $przepis->setSkladniki($przepisBaza->getSkladniki());
            $przepis->setWykonanie($przepisBaza->getWykonanie());
            $przepis->setZrodlo($przepisBaza->getZrodlo());
            $przepis->setUwagi($przepisBaza->getUwagi());
            $przepis->setKategorie($przepisBaza->getKategorie());
        }

        $form = $this->createForm(PrzepisType::class, $przepis);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->przepiRepository->update($przepis);

            return $this->redirectToRoute('dodajprzepis');
        }

        $dane = $this->getDoctrine()
            ->getRepository('AppBundle:Przepis')
            ->findAll();

        return $this->render('@App/DodajPrzepis/edytujPrzepis.html.twig', [
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
            'przepis' => $przepis,
            'dane' => $dane,
            'kategorie' =>  $this->kategoriaRepository->getAllOrderByName(),
            'przepisy' => $this->przepiRepository->getAllOrderByName(),
        ]);
    }
}