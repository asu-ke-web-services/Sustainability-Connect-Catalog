<?php

namespace SCCatalog\Repositories\Frontend\Opportunity;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Events\Backend\Opportunity\ProjectCreated;
use SCCatalog\Models\Address\Address;
use SCCatalog\Models\Lookup\Affiliation;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class ProjectRepository
 */
class ProjectRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Project::class;
    }

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
            ->active()
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
    public function getCompletedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->completed()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * Create a new Project record in the database.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function create(array $data)
    {
        if (!empty($data['opportunity_start_at'])) {
            $data['opportunity_start_at'] = Carbon::parse($data['opportunity_start_at']);
        }

        if (!empty($data['opportunity_end_at'])) {
            $data['opportunity_end_at'] = Carbon::parse($data['opportunity_end_at']);
        }

        // if (!empty($data['listing_start_at'])) {
        //     $data['listing_start_at'] = Carbon::parse($data['listing_start_at']);
        // }

        // if (!empty($data['listing_end_at'])) {
        //     $data['listing_end_at'] = Carbon::parse($data['listing_end_at']);
        // }

        // if (!empty($data['application_deadline_at'])) {
        //     $data['application_deadline_at'] = Carbon::parse($data['application_deadline_at']);
        // }

        // If text deadline value is set, that overrides any value in the date field, which is to be set
        // to far-future date for Algolia search purposes.
        // if (!empty($data['application_deadline_text'])) {
        //     $data['application_deadline_at'] = Carbon::create(2030, 12, 31, 23, 59);
        // }


        return DB::transaction(function () use ($data) {

            $project = $this->model->create($data);

            if ($project) {
                // save Addresses
                if ( !empty($data['addresses'] ) ) {
                    foreach ($data['addresses'] as $address) {
                        $project->addresses()->save(Address::firstOrCreate($address));
                    }
                }

                // attach Affiliations
                if ( !empty($data['affiliations'] ) ) {
                    foreach ($data['affiliations'] as $affiliation) {
                        $project->affiliations()->attach($affiliation);
                    }
                }

                // attach Categories
                if ( !empty($data['categories'] ) ) {
                    foreach ($data['categories'] as $category) {
                        $project->categories()->attach($category);
                    }
                }

                // attach Keywords
                if ( !empty($data['keywords'] ) ) {
                    foreach ($data['keywords'] as $keyword) {
                        $project->keywords()->attach($keyword);
                    }
                }

                event(new ProjectCreated($project));

                return $project;
            }

            throw new GeneralException(__('exceptions.backend.opportunity.create_error'));
        });
    }

}
