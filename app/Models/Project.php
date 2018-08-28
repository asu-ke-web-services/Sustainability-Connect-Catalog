<?php

namespace SCCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class Project
 * @package SCCatalog\Models
 * @version June 20, 2018, 11:48 pm UTC
 *
 * @property string compensation
 * @property string responsibilities
 * @property string learning_outcomes
 * @property string sustainability_contribution
 * @property string qualifications
 * @property string application_overview
 * @property string implementation_paths
 * @property string budget_type
 * @property string budget_amount
 * @property string program_lead
 * @property string success_story
 * @property string library_collection
 */
class Project extends Model
{
    use Searchable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    public $table = 'projects';

    public $timestamps = false;

    public $fillable = [
        'review_status_id',
        'degree_program',
        'compensation',
        'responsibilities',
        'learning_outcomes',
        'sustainability_contribution',
        'qualifications',
        'application_instructions',
        'implementation_paths',
        'budget_type_id',
        'budget_amount',
        'program_lead',
        'success_story',
        'library_collection'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * All relationships to be touched on model update (touch updated_at).
     *
     * @var array
     */
    protected $touches = [
        'opportunity'
    ];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    // public static function boot()
    // {
    //     static::saved(function ($model) {
    //         $model->opportunity->filter(function ($item) {
    //             return $item->shouldBeSearchable();
    //         })->searchable();
    //     });
    // }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     **/
    public function opportunity()
    {
        return $this->morphOne(\SCCatalog\Models\Opportunity::class, 'opportunityable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function budgetType()
    {
        return $this->belongsTo(\SCCatalog\Models\BudgetType::class, 'budget_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function reviewStatus()
    {
        return $this->belongsTo(\SCCatalog\Models\OpportunityReviewStatus::class, 'review_status_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /**
     * Get the list of Opportunity Statuses.
     *
     * @return bool
     */
    public function getStatuses()
    {
        \SCCatalog\Models\OpportunityStatus::where('opportunity_type_id', 1)
            ->orderBy('order', 'asc')
            ->get();
    }

    /**
     * Get the value used to index the model.
     *
     * @return mixed
     */
    public function getScoutKey()
    {
        return $this->opportunity->id;
    }

    /**
     * Get the published status of this model.
     *
     * @return bool
     */
    public function isPublished()
    {
        $opportunity = $this->opportunity->toArray();

        if (
            $opportunity['is_hidden'] === 1 ||
            $opportunity['opportunity_status_id'] < 3 ||
            $this->review_status_id !== 1
        ) {
            return false;
        }

        return true;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function shouldBeSearchable()
    {
        if (
            $this->review_status_id !== 1 ||
            $this->isPublished() === false
        ) {
            return false;
        }

        return true;
    }


    public function toSearchableArray()
    {
        // $project = $this->toArray();
        $project = array();

        $project['id']                  = $this->opportunity->id;
        $project['type']                = 'Project';
        $project['name']                = $this->opportunity->name;
        $project['publicName']          = $this->opportunity->public_name;
        $project['description']         = $this->opportunity->description;
        $project['isHidden']            = $this->opportunity->is_hidden;
        $project['startDate']           = $this->opportunity->start_date;
        $project['endDate']             = $this->opportunity->end_date;
        $project['applicationDeadline'] = (
                !is_null($this->opportunity->application_deadline_text) ?
                $this->opportunity->application_deadline_text :
                $this->opportunity->application_deadline
            );
        $project['listingStartDate']    = $this->opportunity->listing_start_date;
        $project['listingEndDate']      = $this->opportunity->listing_end_date;
        $project['followerCount']       = $this->opportunity->follower_count;
        $project['status']              = $this->opportunity->status->name;
        $project['reviewStatus']        = $this->reviewStatus->name;
        $project['organizationName']    = $this->opportunity->organization->name ?? '';
        // $project['parentOpportunity']   = $this->opportunity->parentOpportunity;
        // $project['supervisorUser']      = $this->opportunity->supervisorUser;
        // $project['submittingUser']      = $this->opportunity->submittingUser;


        // Index Location Cities
        $project['locations'] = '';
        foreach ($this->opportunity->addresses as $address) {
            $project['locations'] .= $address['city'] . $address['state'];
        }

        // Index Addresses
        // $project['addresses'] = $this->opportunity->addresses->map(function ($data) {
        //                                 return $data['city'] .
        //                                         ( is_null($data['state']) ? '' : (', ' . $data['state']) ) .
        //                                         ( is_null($data['country']) ? '' : (', ' . $data['country']) );
        // })->toArray();

        // Index Affiliations
        $project['affiliations'] = $this->opportunity->affiliations->map(function ($data) {
            return $data['name'];
        })->toArray();

        // Index Categories names
        $project['categories'] = $this->opportunity->categories->map(function ($data) {
            return $data['name'];
        })->toArray();

        // Index Keywords names
        $project['keywords'] = $this->opportunity->keywords->map(function ($data) {
            return $data['name'];
        })->toArray();

        return $project;
    }
}
