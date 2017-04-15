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
 * Class DodajKategorieController
 * @package AppBundle\Controller
 */
class DodajKategorieController extends Controller
{
    /**
     * @Route("/dodajkategorie", name="dodajkategorie")
     * @Template()
     */
    public function dodajKategorieAction(Request $request)
    {
        $kategoria = new Kategoria();

        $form = $this->createForm(KategoriaType::class, $kategoria);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            (new KategoriaRepository($this->getDoctrine()->getManager()))->save($kategoria);

            return $this->redirectToRoute('kategoriadodana');
        }

        $find = $this->getDoctrine()
            ->getRepository('AppBundle:Kategoria')
            ->findAll();

        return array(
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
            'kategoria' => $kategoria,
            'find' => $find,
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
        );
    }

    /**
     * @return array
     *
     * @Route("/kategoriadodana", name="kategoriadodana")
     * @Template()
     */
    public function kategoriaDodanaAction()
    {
        return [
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName()
        ];
    }

    /**
     * @Route("/usunkategorie", name="usunkategorie")
     */
    public function deleteAction(Request $request)
    {
        $id = $request->get('id');

        (new KategoriaRepository($this->getDoctrine()->getManager()))->delete($id);

        return $this->render('@App/DodajKategorie/kategoriaUsunieta.html.twig', array(
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
        ));
    }

    /**
     * @Route("/edytujkategorie", name="edytujkategorie")
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

            (new KategoriaRepository($this->getDoctrine()->getManager()))->update($kategoria);

            return $this->render('AppBundle:DodajKategorie:kategoriaZedytowana.html.twig', array(
                'form' => $form->createView(),
                'isValid' => $form->isValid(),
                'kategoria' => $kategoria,
                'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
            ));
        }

        $dane = $this->getDoctrine()
            ->getRepository('AppBundle:Kategoria')
            ->findAll();

        return $this->render('@App/DodajKategorie/edytujKategorie.html.twig', array(
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
            'kategoria' => $kategoria,
            'dane' => $dane,
            'kategorie' => (new KategoriaRepository($this->getDoctrine()->getManager()))->getAllOrderByName(),
        ));
    }
}