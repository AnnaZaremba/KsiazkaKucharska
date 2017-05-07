<?php

namespace AppBundle\Repository\Doctrine;

use AppBundle\Entity\Kategoria;
use AppBundle\Entity\Przepis as PrzepisEntity;
use AppBundle\Form\Model\Przepis;
use AppBundle\Form\Model\Search;

class PrzepiRepository extends DoctrineRepository
{
    public function getAllOrderByName()
    {
        return $this->getEntityManager()
            ->getRepository('AppBundle:Przepis')
            ->findBy([], ['nazwa' => 'ASC']);
    }

    public function getOneById($id)
    {
        return $this->getEntityManager()
            ->getRepository('AppBundle:Przepis')
            ->find($id);
    }

    public function getAll()
    {
        return $this->getEntityManager()
            ->getRepository('AppBundle:Przepis')
            ->findBy([], ['createat' => 'DESC']);
    }

    public function getLast()
    {
        return $this->getEntityManager()
            ->getRepository('AppBundle:Przepis')
            ->findOneBy([], ['id' => 'DESC']);
    }

    /**
     * @param Search $search
     * @return array
     */
    public function search($search)
    {
        return $this->getEntityManager()
            ->getRepository('AppBundle:Przepis')
            ->createQueryBuilder('p')
            ->where('lower(p.nazwa) LIKE lower(:nazwa)')
            ->andWhere('lower(p.skladniki) LIKE lower(:skladniki)')
            ->andWhere('lower(p.wykonanie) LIKE lower(:wykonanie)')
            ->setParameter('nazwa', '%' . $search->getNazwa() . '%')
            ->setParameter('skladniki', '%' . $search->getSkladniki() . '%')
            ->setParameter('wykonanie', '%' . $search->getWykonanie() . '%')
            ->getQuery()
            ->getResult();
    }

    protected function getEntityClassName()
    {
        return 'AppBundle:Przepis';
    }

    public function save(Przepis $przepis)
    {
        $em = $this->getEntityManager();

        $przepisBaza = new PrzepisEntity();
        $przepisBaza->setNazwa($przepis->getNazwa());
        $przepisBaza->setZdjecie($przepis->getZdjecie());
        $przepisBaza->setSkladniki($przepis->getSkladniki());
        $przepisBaza->setWykonanie($przepis->getWykonanie());
        $przepisBaza->setZrodlo($przepis->getZrodlo());
        $przepisBaza->setUwagi($przepis->getUwagi());

        /** @var Kategoria $kategoria */
        foreach ($przepis->getKategorie() as $kategoria) {
            $przepisBaza->addKategoria($kategoria);
        }

        $em->persist($przepisBaza);
        $em->flush();
    }

    public function update(Przepis $przepis)
    {
        $em = $this->getEntityManager();
        /** @var PrzepisEntity $przepisBaza */
        $przepisBaza = $this->find($przepis->getId());

        $przepisBaza->setNazwa($przepis->getNazwa());
        $przepisBaza->setZdjecie($przepis->getZdjecie());
        $przepisBaza->setSkladniki($przepis->getSkladniki());
        $przepisBaza->setWykonanie($przepis->getWykonanie());
        $przepisBaza->setZrodlo($przepis->getZrodlo());
        $przepisBaza->setUwagi($przepis->getUwagi());

        //usuniecie
        $przepisBaza->removeKategorie();

        /** @var Kategoria $kategoria */
        foreach ($przepis->getKategorie() as $kategoria) {
            $przepisBaza->addKategoria($kategoria);
        }

        $em->persist($przepisBaza);
        $em->flush();
    }

    public function delete($id)
    {
        $przepisBaza = $this->find($id);
        $przepisBaza->removeKategorie();
        $em = $this->getEntityManager();
        $em->remove($przepisBaza);
        $em->flush();
    }
}