<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 22.03.17
 * Time: 19:32
 */

namespace AppBundle\Repository\Doctrine;

use AppBundle\Entity\Kategoria as KategoriaEntity;
use AppBundle\Entity\Kategoria;

class KategoriaRepository extends DoctrineRepository
{
    public function getAllOrderByName()
    {
        return $this->getEntityManager()
            ->getRepository('AppBundle:Kategoria')
            ->findBy([], ['nazwa' => 'ASC']);
    }

    public function getOneById($id)
    {
        return $this->getEntityManager()
            ->getRepository('AppBundle:Kategoria')
            ->find($id);
    }

    protected function getEntityClassName()
    {
        return 'AppBundle:Kategoria';
    }

    public function save(\AppBundle\Form\Model\Kategoria $kategoria)
    {
        $em = $this->getEntityManager();

        $kategoriaBaza = new KategoriaEntity();
        $kategoriaBaza->setNazwa($kategoria->getNazwa());
        $kategoriaBaza->setImage($kategoria->getImage());

        $em->persist($kategoriaBaza);
        $em->flush();
    }

    public function update(\AppBundle\Form\Model\Kategoria $kategoria)
    {
        $em = $this->getEntityManager();

        $kategoriaBaza = $this ->find($kategoria->getId());

        $kategoriaBaza->setNazwa($kategoria->getNazwa());
        $kategoriaBaza->setImage($kategoria->getImage());

        $em->persist($kategoriaBaza);
        $em->flush();
    }

    public function delete($id)
    {
        $kategoriaBaza = $this->find($id);

        $em = $this->getEntityManager();
        $em->remove($kategoriaBaza);
        $em->flush();
    }
}