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
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DodajPrzepisController
 * @package AppBundle\Controller
 */
class DodajPrzepisController extends Controller
{
    /**
     * @Route("/dodajprzepis", name="dodajprzepis")
     * @Template()
     */
    public function dodajPrzepisAction(Request $request)
    {
        $przepis = new Przepis();
        $form = $this->createForm(PrzepisType::class, $przepis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            (new PrzepiRepository($this->getDoctrine()->getManager()))->save($przepis);
            return $this->redirectToRoute('przepisdodany');
        }

        $find = $this->getDoctrine()
            ->getRepository('AppBundle:Przepis')
            ->findAll();

        return array(
            'form' => $form->createView(),
            'przepis' => $przepis,
            'find' => $find,
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
            'przepisy' => (new PrzepiRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
        );
    }

    /**
     * @return array
     *
     * @Route("/przepisdodany", name="przepisdodany")
     * @Template()
     */
    public function przepisDodanyAction()
    {
        return [
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
            'przepisy' => (new PrzepiRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
        ];
    }

    /**
     * @Route("/usunprzepis", name="usunprzepis")
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');

        (new PrzepiRepository($this->getDoctrine()->getManager()))->delete($id);

        return $this->render('@App/DodajPrzepis/PrzepisUsuniety.html.twig', array(
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
            'przepisy' => (new PrzepiRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
        ));
    }

    /**
     * @Route("/edytujprzepis", name="edytujprzepis")
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
            $przepis->setSkladniki($przepisBaza->getSkladniki());
            $przepis->setWykonanie($przepisBaza->getWykonanie());
            $przepis->setZrodlo($przepisBaza->getZrodlo());
            $przepis->setUwagi($przepisBaza->getUwagi());
            $przepis->setKategorie($przepisBaza->getKategorie());
        }

        $form = $this->createForm(PrzepisType::class, $przepis);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            (new PrzepiRepository($this->getDoctrine()->getManager()))->update($przepis);

            return $this->render('@App/DodajPrzepis/PrzepisZedytowany.html.twig', array(
                'form' => $form->createView(),
                'isValid' => $form->isValid(),
                'przepis' => $przepis,
                'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
                'przepisy' => (new PrzepiRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
            ));
        }

        $dane = $this->getDoctrine()
            ->getRepository('AppBundle:Przepis')
            ->findAll();

        return $this->render('@App/DodajPrzepis/edytujPrzepis.html.twig', array(
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
            'przepis' => $przepis,
            'dane' => $dane,
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
            'przepisy' => (new PrzepiRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
        ));
    }
}