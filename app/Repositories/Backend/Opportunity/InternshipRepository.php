<?php

namespace SCCatalog\Repositories\Backend\Opportunity;

use Illuminate\Pagination\LengthAwarePaginator;
use SCCatalog\Models\Address\Address;
use SCCatalog\Models\Lookup\Affiliation;
use SCCatalog\Models\Lookup\Category;
use SCCatalog\Models\Lookup\Keyword;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\Backend\Opportunity\OpportunityRepository;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class InternshipRepository
 */
class InternshipRepository extends OpportunityRepository
{

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getActivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->with('roles', 'permissions', 'providers')
            ->active()
            ->filterByType('Internship')
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getClosedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->with('roles', 'permissions', 'providers')
            ->active(false)
            ->filterByType('Internship')
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getDeletedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->with('roles', 'permissions', 'providers')
            ->onlyTrashed()
            ->filterByType('Internship')
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * Create a new Internship record in the database.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
//        dd($data);
        BaseRepository::unsetClauses();

        // Create child internship record
        $internship = Internship::create($data['opportunityable']);
        // Create base opportunity record
        $opportunity = $this->model->create($data);
        // Link internship to opportunity
        $internship->opportunity()->save($opportunity);

        // sync Addresses
        foreach ($data['addresses'] as $address) {
            $newAddress = Address::create($address);
            $opportunity->addresses()->attach($newAddress);
        }

        // sync Affiliations
        foreach ($data['affiliations'] as $affiliation) {
            $opportunity->affiliations()->attach($affiliation);
        }

        // sync Categories
        foreach ($data['categories'] as $category) {
            $opportunity->categories()->attach($category);
        }

        // sync Keywords
        foreach ($data['keywords'] as $keyword) {
            $opportunity->keywords()->attach($keyword);
        }

        // Set other opportunity relationships
//        $opportunity = BaseRepository::updateRelations($opportunity, $data);
//        $opportunity->save();

        return $opportunity;
    }

    /**
     * Create a new Internship record in the database.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, array $data)
    {
        BaseRepository::unsetClauses();

        $opportunity = BaseRepository::getById($id);

        // Update internship record
        $opportunity->opportunityable()->update($data['opportunityable']);

        // Update opportunity base record
        $opportunity->update($data);

        // sync Addresses
        $addresses = [];
        foreach ($data['addresses'] as $address) {
            $addresses[] = Address::firstOrCreate($address);
        }
        $addressIds = array_map(function($address) { return $address->id; }, $addresses);
        $opportunity->addresses()->sync($addressIds);

        // sync Affiliations
        $opportunity->affiliations()->sync($data['affiliations']);
//        foreach ($data['affiliations'] as $affiliation) {
//        }

        // sync Categories
        $opportunity->categories()->attach($data['categories']);
//        foreach ($data['categories'] as $category) {
//            $opportunity->categories()->attach($category);
//        }

        // sync Keywords
        $opportunity->keywords()->attach($data['keywords']);
//        foreach ($data['keywords'] as $keyword) {
//            $opportunity->keywords()->attach($keyword);
//        }


        // Update opportunity relations
//        $opportunity = BaseRepository::updateRelations($opportunity, $data);
//        $opportunity->save();

        return $opportunity;
    }

}
