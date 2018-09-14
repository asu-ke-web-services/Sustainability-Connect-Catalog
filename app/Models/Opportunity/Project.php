<?php

namespace SCCatalog\Models\Opportunity;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
// use Venturecraft\Revisionable\RevisionableTrait;
//
/**
 * Class Project
 */
class Project extends Model
{
    // use RevisionableTrait;
    use Searchable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

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
        return $this->morphOne(\SCCatalog\Models\Opportunity\Opportunity::class, 'opportunityable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function budgetType()
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\BudgetType::class, 'budget_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function reviewStatus()
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\OpportunityReviewStatus::class, 'review_status_id');
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

    // /**
    //  * Get the list of Opportunity Statuses.
    //  *
    //  * @return mixed
    //  */
    // public function getStatuses()
    // {
    //     \SCCatalog\Models\Lookup\OpportunityStatus::where('opportunity_type_id', 1)
    //         ->orderBy('order', 'asc')
    //         ->get();
    // }

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.opportunity.project.show', $this->opportunity).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info"><i class="fas fa-eye"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.opportunity.project.edit', $this->opportunity).'" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.opportunity.project.destroy', $this->opportunity).'"
             data-method="delete"
             data-trans-button-cancel="'.__('buttons.general.cancel').'"
             data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
             data-trans-title="'.__('strings.backend.general.are_you_sure').'"
             class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group btn-group-sm" role="group" aria-label="Actions">
              '.$this->show_button.'
              '.$this->edit_button.'
              '.$this->delete_button.'
            </div>';
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
         return false;
//         if (
//             $this->review_status_id !== 1 ||
//             $this->isPublished() === false
//         ) {
//             return false;
//         }
//
//         return true;
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
