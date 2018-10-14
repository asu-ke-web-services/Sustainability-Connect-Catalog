<?php

namespace SCCatalog\Repositories\Backend\Opportunity;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use SCCatalog\Exceptions\GeneralException;
use SCCatalog\Events\Backend\Opportunity\OpportunityCreated;
use SCCatalog\Events\Backend\Opportunity\OpportunityUpdated;
use SCCatalog\Events\Backend\Opportunity\OpportunityCloned;
use SCCatalog\Events\Backend\Opportunity\OpportunityDeleted;
use SCCatalog\Models\Address\Address;
use SCCatalog\Models\Lookup\Affiliation;
use SCCatalog\Models\Lookup\Category;
use SCCatalog\Models\Lookup\Keyword;
use SCCatalog\Models\Opportunity\Opportunity;
use SCCatalog\Repositories\BaseRepository;

/**
 * Class OpportunityRepository
 */
class OpportunityRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Opportunity::class;
    }

    /**
     * Array of related models to always eager load.
     *
     * @var array
     */
    protected $with = [
        'opportunityable',
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
     * Create a new Opportunity record in the database.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {

            // Create opportunityable record
            $opportunityable = $data['opportunityable_type']::create($data['opportunityable']);

            // Create base opportunity record
            $opportunity = $this->model->create($data);

            // Link opportunityable to opportunity
            $opportunityable->opportunity()->save($opportunity);

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
     * Create a new Opportunity record in the database.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(Opportunity $opportunity, array $data)
    {
        $opportunity->loadMissing(
            'opportunityable',
            'addresses',
            'affiliations',
            'categories',
            'keywords'
        );

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

    /**
     * Clone opportunity.
     *
     * @param Opportunity $opportunity
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function clone(Opportunity $opportunity)
    {
        return DB::transaction(function () use ($opportunity) {

            $opportunity->load(
                'opportunityable',
                'affiliations',
                'categories',
                'keywords',
                'users',
                'addresses',
                'notes'
            );

            // Copy attributes of original base model
            $clone = $opportunity->replicate();
            // save model before recreating the relations
            $clone->push();

            // reset relations on the original model to control how we replicate them
            $opportunity->relations = [];

            // load the relations to replicate the associated models
            $opportunity->load(
                'opportunityable',
                'addresses',
                'notes'
            );

            // replicate associated models
            foreach($opportunity->getRelations() as $relation => $items){
                foreach($items as $item){
                    unset($item->id);
                    $clone->{$relation}()->create($item->toArray());
                }
            }

            $opportunity->relations = [];

            // load the relations we want to clone
            $opportunity->load(
                'affiliations',
                'categories',
                'keywords',
                'users'
            );

            // replicate associated models
            foreach($opportunity->getRelations() as $relation => $items){
                foreach($items as $item){
                    $clone->{$relation}()->attach($item->id);
                }
            }

            if ( $clone ) {

                event(new OpportunityCloned($clone));

                return $clone;
            }

            throw new GeneralException(__('exceptions.backend.opportunity.projects.clone_error'));
        });
    }
}
