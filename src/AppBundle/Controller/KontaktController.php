<?php
namespace AppBundle\Controller;

use AppBundle\Form\Model\Kontakt;
use AppBundle\Entity\Kontakt as KontaktBaza;
use AppBundle\Repository\Doctrine\KategoriaRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(service="app.kontakt_controller")
 */
class KontaktController extends Controller
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
     * @Route("/kontakt", name="kontakt")
     * @Template()
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function kontaktAction(Request $request)
    {
        $kontakt = new Kontakt();

        $form = $this->createFormBuilder($kontakt)
            ->add('imie', TextType::class)
            ->add('email', TextType::class)
            ->add('temat', TextType::class)
            ->add('wiadomosc', TextareaType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $kontaktBaza = new KontaktBaza();
            $kontaktBaza->setImie($kontakt->getImie());
            $kontaktBaza->setEmail($kontakt->getEmail());
            $kontaktBaza->setTemat($kontakt->getTemat());
            $kontaktBaza->setWiadomosc($kontakt->getWiadomosc());

            $em->persist($kontaktBaza);
            $em->flush();

            return $this->redirectToRoute('mailwyslany');
        }

        $find = $this->getDoctrine()
            ->getRepository('AppBundle:Kontakt')
            ->findAll();

        return array(
            'form' => $form->createView(),
            'isValid' => $form->isValid(),
            'kontakt' => $kontakt,
            'find' => $find,
            'kategorie' => $this->kategoriaRepository->getAllOrderByName()
        );
    }

    /**
     * @return array
     *
     * @Route("/mailwyslany", name="mailwyslany")
     * @Template()
     */
    public function mailWyslanyAction()
    {
        return [
            'kategorie' => $this->kategoriaRepository->getAllOrderByName()
        ];
    }
}