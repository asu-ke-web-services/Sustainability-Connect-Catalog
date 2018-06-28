<?php

namespace SCCatalog\Support\Contracts\Repository;

use Doctrine\Common\Persistence\ObjectRepository;

/**
 * Interface AddressRepository
 *
 * @package    App\Support\Contracts\Repository
 * @subpackage App\Support\Contracts\Repository\AddressRepository
 */
interface AddressRepository extends ObjectRepository
{
    public function create($data);

    public function update($data, $id);

    public function save($object);

    public function remove($object);

    // public function find($id);

    // public function findAll();
}
