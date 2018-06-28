<?php

namespace SCCatalog\Support;

use Doctrine\ORM\EntityRepository;

/**
 * Class AppEntityRepository
 *
 * @package    SCCatalog\Support
 * @subpackage SCCatalog\Support\AppEntityRepository
 */
abstract class AppEntityRepository extends EntityRepository
{
    /**
     * @param mixed $entity
     */
    public function save($entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush($entity);
    }

    /**
     * @param mixed $entity
     */
    public function remove($entity)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush($entity);
    }
}
