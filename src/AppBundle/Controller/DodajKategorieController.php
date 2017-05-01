<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Kategoria as KategoriaEntity;
use AppBundle\Form\Model\Kategoria;
use AppBundle\Form\Type\KategoriaType;
use AppBundle\Repository\Doctrine\KategoriaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(service="app.dodaj_kategorie_controller")
 */
class DodajKategorieController extends Controller
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
     * @Route("/dodajkategorie", name="dodajkategorie")
     * @Template()
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function dodajKategorieAction(Request $request)
    {
        $kategoria = new Kategoria();

        $form = $this->createForm(KategoriaType::class, $kategoria);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->kategoriaRepository->save($kategoria);

            return $this->redirectToRoute('dodajkategorie');
        }

        $find = $this->getDoctrine()
            ->getRepository('AppBundle:Kategoria')
            ->findAll();

        return array(
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
            'kategoria' => $kategoria,
            'find' => $find,
            'kategorie' => $this->kategoriaRepository->getAllOrderByName(),
        );
    }

    /**
     * @Route("/usunkategorie", name="usunkategorie")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');

        $this->kategoriaRepository->delete($id);

        return $this->redirectToRoute('dodajkategorie');
    }

    /**
     * @Route("/edytujkategorie", name="edytujkategorie")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request)
    {
        $id = $request->get('id');
        $kategoria = new Kategoria();

        if (isset($id)) {
            /** @var KategoriaEntity $kategoriaBaza */
            $kategoriaBaza = $this->getDoctrine()
                ->getRepository('AppBundle:Kategoria')
                ->find($id);

            $kategoria->setId($kategoriaBaza->getId());
            $kategoria->setNazwa($kategoriaBaza->getNazwa());
            $kategoria->setImage($kategoriaBaza->getImage());
        }

        $form = $this->createForm(KategoriaType::class, $kategoria);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->kategoriaRepository->update($kategoria);

            return $this->redirectToRoute('dodajkategorie');
        }

        $dane = $this->getDoctrine()
            ->getRepository('AppBundle:Kategoria')
            ->findAll();

        return $this->render('@App/DodajKategorie/edytujKategorie.html.twig', array(
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
            'kategoria' => $kategoria,
            'dane' => $dane,
            'kategorie' => $this->kategoriaRepository->getAllOrderByName(),
        ));
    }
}