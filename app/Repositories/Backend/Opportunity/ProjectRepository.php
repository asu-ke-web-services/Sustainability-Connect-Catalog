<?php

namespace SCCatalog\Repositories\Backend\Opportunity;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Events\Backend\Opportunity\OpportunityCreated;
use SCCatalog\Events\Backend\Opportunity\OpportunityUpdated;
use SCCatalog\Models\Address\Address;
use SCCatalog\Models\Lookup\Affiliation;
use SCCatalog\Models\Lookup\Category;
use SCCatalog\Models\Lookup\Keyword;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\Backend\Opportunity\OpportunityRepository;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class ProjectRepository
 */
class ProjectRepository extends OpportunityRepository
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
            ->filterByType('Project')
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
            ->filterByType('Project')
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
            ->filterByType('Project')
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * Create a new Project record in the database.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            // Create child project record
            $project = Project::create($data['opportunityable']);
            // Create base opportunity record
            $opportunity = $this->model->create($data);
            // Link project to opportunity
            $project->opportunity()->save($opportunity);
 
            if ($opportunity) {
                // sync Addresses
                if ( isset($data['addresses'] ) ) {
                    foreach ($data['addresses'] as $address) {
                        $newAddress = Address::create($address);
                        $opportunity->addresses()->attach($newAddress);
                    }
                }

                // sync Affiliations
                if ( isset($data['addresses'] ) ) {
                    foreach ($data['affiliations'] as $affiliation) {
                        $opportunity->affiliations()->attach($affiliation);
                    }
                }

                // sync Categories
                if ( isset($data['addresses'] ) ) {
                    foreach ($data['categories'] as $category) {
                        $opportunity->categories()->attach($category);
                    }
                }

                // sync Keywords
                if ( isset($data['addresses'] ) ) {
                    foreach ($data['keywords'] as $keyword) {
                        $opportunity->keywords()->attach($keyword);
                    }
                }

                event(new OpportunityCreated($opportunity));

                return $opportunity;
            }

            throw new GeneralException(__('exceptions.backend.opportunity.projects.create_error'));
        });
    }

    /**
     * Create a new Project record in the database.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, array $data)
    {
        $opportunity = $this->model
            ->with([
                'opportunityable',
                'addresses',
                'affiliations',
                'categories',
                'keywords',
            ])
            ->find($id)->first();

        return DB::transaction(function () use ($opportunity, $data) {
            // Update opportunity base record
            if ($opportunity->update($data)) {
                // sync Addresses
                if ( isset($data['addresses'] ) ) {
                    $addresses = [];
                    foreach ($data['addresses'] as $address) {
                        $addresses[] = Address::firstOrCreate($address);
                    }
                    $addressIds = array_map(function($address) { return $address->id; }, $addresses);
                    $opportunity->addresses()->sync($addressIds);
                }

                // sync Affiliations
                if ( isset($data['addresses'] ) ) {
                    $opportunity->affiliations()->sync($data['affiliations']);
                }

                // sync Categories
                if ( isset($data['addresses'] ) ) {
                    $opportunity->categories()->sync($data['categories']);
                }

                // sync Keywords
                if ( isset($data['addresses'] ) ) {
                    $opportunity->keywords()->sync($data['keywords']);
                }

                event(new OpportunityUpdated($opportunity));

                return $opportunity;
            }
            
            throw new GeneralException(__('exceptions.backend.opportunity.projects.update_error'));
        });
    }

}
