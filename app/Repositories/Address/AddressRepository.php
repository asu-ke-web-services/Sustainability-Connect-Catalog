<?php

namespace SCCatalog\Repositories\Address;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Models\Address\Address;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class AddressRepository
 */
class AddressRepository extends BaseRepository
{
    /**
     * AddressRepository constructor.
     *
     * @param  Address  $model
     */
    public function __construct(Address $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     *
     * @throws \Exception
     * @throws \Throwable
     * @return Address
     */
    public function create(array $data) : Address
    {
        return DB::transaction(function () use ($data) {
            $address = $this->model::create($data);

            if ($address) {
                event(new AddressCreated($address));

                return $address;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param Address  $address
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Address
     */
    public function update(Address $address, array $data) : Address
    {
        return DB::transaction(function () use ($address, $data) {
            if ($address->update($data)) {
                event(new AddressUpdated($address));

                return $address;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }
}
