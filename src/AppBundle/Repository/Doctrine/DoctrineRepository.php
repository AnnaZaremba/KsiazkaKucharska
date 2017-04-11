<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 22.03.17
 * Time: 19:35
 */

namespace AppBundle\Repository\Doctrine;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

abstract class DoctrineRepository extends EntityRepository
{
    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata($this->getEntityClassName()));
    }

    protected function doAdd($entity)
    {
        $this->_em->persist($entity);
    }

    abstract protected function getEntityClassName();
}