<?php

namespace SCCatalog\Repositories\Backend\Opportunity;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Events\Backend\Opportunity\ProjectCreated;
use SCCatalog\Events\Backend\Opportunity\ProjectUpdated;
use SCCatalog\Events\Backend\Opportunity\ProjectCloned;
use SCCatalog\Models\Address\Address;
use SCCatalog\Models\Opportunity\Project;
use SCCatalog\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

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
     * Array of related models to always eager load.
     *
     * @var array
     */
    protected $with = [
        // 'addresses',
        // 'notes',
        // 'status',
        // 'parentOpportunity',
        // 'organization',
        // 'supervisorUser',
        // 'affiliations',
        // 'categories',
        // 'keywords',
        // 'followers',
        // 'applicants',
    ];

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getSearchPaginated($paged = 25, $search = '', $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->search($search)
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int $paged
     * @param string $search
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getActivePaginated($paged = 25, $search = '', $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->search($search)
            ->active()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int $paged
     * @param string $search
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getAllPaginated($paged = 25, $search = '', $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->search($search)
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int $paged
     * @param string $search
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getPublishedPaginated($paged = 25, $search = '', $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->search($search)
            ->isPublished()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int $paged
     * @param string $search
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getArchivedPaginated($paged = 25, $search = '', $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->search($search)
            ->archived()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int $paged
     * @param string $search
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getCompletedPaginated($paged = 25, $search = '', $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->search($search)
            ->completed()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int $paged
     * @param string $search
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getDeletedPaginated($paged = 25, $search = '', $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->search($search)
            ->onlyTrashed()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int $paged
     * @param string $search
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getImportReviewsPaginated($paged = 25, $search = '', $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->search($search)
            ->needsImportReview()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int $paged
     * @param string $search
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getProposalReviewsPaginated($paged = 25, $search = '', $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->search($search)
            ->proposalNeedsReview()
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
        return DB::transaction(function () use ($data) {

            $internship = $this->model->create($data);

            if ($internship) {
                // sync Addresses
                if ( isset($data['addresses'] ) ) {
                    foreach ($data['addresses'] as $address) {
                        $newAddress = Address::create($address);
                        $internship->addresses()->attach($newAddress);
                    }
                }

                // sync Affiliations
                if ( isset($data['affiliations'] ) ) {
                    foreach ($data['affiliations'] as $affiliation) {
                        $internship->affiliations()->attach($affiliation);
                    }
                }

                // sync Categories
                if ( isset($data['categories'] ) ) {
                    foreach ($data['categories'] as $category) {
                        $internship->categories()->attach($category);
                    }
                }

                // sync Keywords
                if ( isset($data['keywords'] ) ) {
                    foreach ($data['keywords'] as $keyword) {
                        $internship->keywords()->attach($keyword);
                    }
                }

                event(new ProjectCreated($internship));

                return $internship;
            }

            throw new GeneralException(__('exceptions.backend.opportunity.create_error'));
        });
    }

    /**
     * Create a new Project record in the database.
     *
     * @param Project $internship
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function update(Project $internship, array $data)
    {
        $internship->loadMissing(
            'addresses',
            'affiliations',
            'categories',
            'keywords'
        );

        return DB::transaction(function () use ($internship, $data) {

            if ($internship->update($data)) {
                // sync Addresses
                if ( isset($data['addresses'] ) ) {
                    $addresses = [];
                    foreach ($data['addresses'] as $address) {
                        $addresses[] = Address::firstOrCreate($address);
                    }
                    $addressIds = array_map(function($address) { return $address->id; }, $addresses);
                    $internship->addresses()->sync($addressIds);
                }

                // sync Affiliations
                if ( isset($data['affiliations'] ) ) {
                    $internship->affiliations()->sync($data['affiliations']);
                }

                // sync Categories
                if ( isset($data['categories'] ) ) {
                    $internship->categories()->sync($data['categories']);
                }

                // sync Keywords
                if ( isset($data['keywords'] ) ) {
                    $internship->keywords()->sync($data['keywords']);
                }

                event(new ProjectUpdated($internship));

                return $internship;
            }

            throw new GeneralException(__('exceptions.backend.opportunity.update_error'));
        });
    }

    /**
     * Clone opportunity.
     *
     * @param Project $project
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function clone(Project $project)
    {
        return DB::transaction(function () use ($project) {

            $project->load(
                'affiliations',
                'categories',
                'keywords',
                'users',
                'addresses',
                'notes'
            );

            // Copy attributes of original base model
            $clone = $project->replicate();
            // save model before recreating the relations
            $clone->push();

            // reset relations on the original model to control how we replicate them
            $project->relations = [];

            // load the relations to replicate (clone the associated models)
            $project->load(
                'addresses',
                'notes'
            );

            // replicate associated models
            foreach($project->getRelations() as $relation => $items){
                foreach($items as $item){
                    unset($item->id);
                    $clone->{$relation}()->create($item->toArray());
                }
            }

            $project->relations = [];

            // load the relations we want re-attach (to associated models)
            $project->load(
                'affiliations',
                'categories',
                'keywords',
                'organizations',
                'users'
            );

            // attach associated models
            foreach($project->getRelations() as $relation => $items){
                foreach($items as $item){
                    $clone->{$relation}()->attach($item->id);
                }
            }

            if ( $clone ) {

                event(new ProjectCloned($clone));

                return $clone;
            }

            throw new GeneralException(__('exceptions.backend.opportunity.clone_error'));
        });
    }

    /**
     * (Soft)-delete an Project record in the database.
     *
     * @param int $project_id
     * @return bool
     * @throws \Throwable
     */
    public function deleteById($project_id) : bool
    {
        return DB::transaction(function () use ($project_id) {
            $project = parent::getById($project_id);

            if (parent::deleteById($project_id)) {

                event(new ProjectUpdated($project));

                return true;
            }

            throw new GeneralException(__('exceptions.backend.opportunity.destroy_error'));
        });
    }
}
