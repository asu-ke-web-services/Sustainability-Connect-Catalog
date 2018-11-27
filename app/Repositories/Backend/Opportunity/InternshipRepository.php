<?php

namespace SCCatalog\Repositories\Backend\Opportunity;

use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Events\Backend\Opportunity\InternshipCreated;
use SCCatalog\Events\Backend\Opportunity\InternshipUpdated;
use SCCatalog\Events\Backend\Opportunity\InternshipCloned;
use SCCatalog\Models\Address\Address;
use SCCatalog\Models\Opportunity\Internship;
use SCCatalog\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class InternshipRepository
 */
class InternshipRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Internship::class;
    }

    /**
     * Array of related models to always eager load.
     *
     * @var array
     */
    protected $with = [
        'addresses',
        'notes',
        'status',
        'organization',
        'affiliations',
        'categories',
        'keywords',
    ];

    /**
     * @return mixed
     */
    public function getActiveCount()
    {
        return $this->model
            ->active()
            ->count();
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
    public function getInactivePaginated($paged = 25, $search = '', $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            // ->search($search)
            ->inactive()
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
     * @return mixed
     */
    public function getImportReviewPaginated($paged = 25, $search = '', $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->needsImportReview()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * Create a new Internship record in the database.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {

            if (null != $data['opportunity_start_at']) {
                $data['opportunity_start_at'] = Carbon::parse($data['opportunity_start_at']);
            }

            if (null != $data['opportunity_end_at']) {
                $data['opportunity_end_at'] = Carbon::parse($data['opportunity_end_at']);
            }

            if (null != $data['listing_start_at']) {
                $data['listing_start_at'] = Carbon::parse($data['listing_start_at']);
            }

            if (null != $data['listing_end_at']) {
                $data['listing_end_at'] = Carbon::parse($data['listing_end_at']);
            }

            if (null != $data['application_deadline_at']) {
                $data['application_deadline_at'] = Carbon::parse($data['application_deadline_at']);
            }

            $internship = $this->model->create($data);

            if ($internship) {
                // save Addresses
                if ( isset($data['addresses'] ) ) {
                    foreach ($data['addresses'] as $address) {
                        $internship->addresses()->save(Address::firstOrCreate($address));
                    }
                }

                // attach Affiliations
                if ( isset($data['affiliations'] ) ) {
                    foreach ($data['affiliations'] as $affiliation) {
                        $internship->affiliations()->attach($affiliation);
                    }
                }

                // attach Categories
                if ( isset($data['categories'] ) ) {
                    foreach ($data['categories'] as $category) {
                        $internship->categories()->attach($category);
                    }
                }

                // attach Keywords
                if ( isset($data['keywords'] ) ) {
                    foreach ($data['keywords'] as $keyword) {
                        $internship->keywords()->attach($keyword);
                    }
                }

                event(new InternshipCreated($internship));

                return $internship;
            }

            throw new GeneralException(__('exceptions.backend.opportunity.create_error'));
        });
    }

    /**
     * Create a new Internship record in the database.
     *
     * @param Internship $internship
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function update(Internship $internship, array $data)
    {
        $internship->loadMissing(
            'addresses',
            'affiliations',
            'categories',
            'keywords'
        );

        if (null != $data['opportunity_start_at']) {
            $data['opportunity_start_at'] = Carbon::parse($data['opportunity_start_at']);
        }

        if (null != $data['opportunity_end_at']) {
            $data['opportunity_end_at'] = Carbon::parse($data['opportunity_end_at']);
        }

        if (null != $data['listing_start_at']) {
            $data['listing_start_at'] = Carbon::parse($data['listing_start_at']);
        }

        if (null != $data['listing_end_at']) {
            $data['listing_end_at'] = Carbon::parse($data['listing_end_at']);
        }

        if (null != $data['application_deadline_at']) {
            $data['application_deadline_at'] = Carbon::parse($data['application_deadline_at']);
        }

        return DB::transaction(function () use ($internship, $data) {

            if ($internship->update($data)) {
                // save Addresses
                if ( isset($data['addresses'] ) ) {
                    foreach ($data['addresses'] as $address) {
                        $internship->addresses()->save(Address::firstOrCreate($address));
                    }
                }

                // sync Affiliations
                $internship->affiliations()->sync($data['affiliations'] ?? null);

                // sync Categories
                $internship->categories()->sync($data['categories'] ?? null);

                // sync Keywords
                $internship->keywords()->sync($data['keywords'] ?? null);

                event(new InternshipUpdated($internship));

                return $internship;
            }

            throw new GeneralException(__('exceptions.backend.opportunity.update_error'));
        });
    }

    /**
     * Clone opportunity.
     *
     * @param Internship $internship
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function clone(Internship $internship)
    {
        return DB::transaction(function () use ($internship) {

            $internship->load(
                'affiliations',
                'categories',
                'keywords',
                'users',
                'addresses',
                'notes'
            );

            // Copy attributes of original base model
            $clone = $internship->replicate();
            // save model before recreating the relations
            $clone->push();

            // reset relations on the original model to control how we replicate them
            $internship->relations = [];

            // load the relations to replicate (clone the associated models)
            $internship->load(
                'addresses',
                'notes'
            );

            // replicate associated models
            foreach($internship->getRelations() as $relation => $items){
                foreach($items as $item){
                    unset($item->id);
                    $clone->{$relation}()->create($item->toArray());
                }
            }

            $internship->relations = [];

            // load the relations we want re-attach (to associated models)
            $internship->load(
                'affiliations',
                'categories',
                'keywords',
                'organizations',
                'users'
            );

            // attach associated models
            foreach($internship->getRelations() as $relation => $items){
                foreach($items as $item){
                    $clone->{$relation}()->attach($item->id);
                }
            }

            if ( $clone ) {

                event(new InternshipCloned($clone));

                return $clone;
            }

            throw new GeneralException(__('exceptions.backend.opportunity.clone_error'));
        });
    }

    /**
     * (Soft)-delete an Internship record in the database.
     *
     * @param int $internship_id
     * @return bool
     * @throws \Throwable
     */
    public function deleteById($internship_id) : bool
    {
        return DB::transaction(function () use ($internship_id) {
            $internship = parent::getById($internship_id);

            if (parent::deleteById($internship_id)) {

                event(new InternshipUpdated($internship));

                return true;
            }

            throw new GeneralException(__('exceptions.backend.opportunity.destroy_error'));
        });
    }
}
