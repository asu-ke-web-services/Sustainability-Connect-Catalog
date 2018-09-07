<?php

namespace SCCatalog\Models\Opportunity;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

/**
 * Class Internship
 */
class Internship extends Model
{
    // use Searchable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    public $timestamps = false;

    protected $dates = [

    ];

    public $fillable = [
        'degree_program',
        'compensation',
        'responsibilities',
        'qualifications',
        'application_instructions',
        'program_lead',
        'success_story',
        'library_collection',
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

    public function opportunity()
    {
        return $this->morphOne(\SCCatalog\Models\Opportunity\Opportunity::class, 'opportunityable');
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
     * Get the value used to index the model.
     *
     * @return mixed
     */
    // public function getScoutKey()
    // {
    //     return $this->opportunity->id;
    // }

    /**
     * Get the published status of this model.
     *
     * @return bool
     */
    // public function isPublished()
    // {
    //     $opportunity = $this->opportunity->toArray();

    //     if (
    //         $opportunity['is_hidden'] === 1 ||
    //         $opportunity['opportunity_status_id'] === 8
    //     ) {
    //         return false;
    //     }

    //     return true;
    // }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    // public function shouldBeSearchable()
    // {
    //     if ( $this->isPublished() === false ) {
    //         return false;
    //     }

    //     return true;
    // }

    // public function toSearchableArray()
    // {
    //     // $internship = $this->toArray();
    //     $internship = array();

    //     $internship['id']                  = $this->opportunity->id;
    //     $internship['type']                = 'Internship';
    //     $internship['name']                = $this->opportunity->name;
    //     $internship['publicName']          = $this->opportunity->public_name;
    //     $internship['description']         = $this->opportunity->description;
    //     $internship['isHidden']            = $this->opportunity->is_hidden;
    //     $internship['startDate']           = $this->opportunity->start_date;
    //     $internship['endDate']             = $this->opportunity->end_date;
    //     $internship['applicationDeadline'] = (
    //             !is_null($this->opportunity->application_deadline_text) ?
    //             $this->opportunity->application_deadline_text :
    //             $this->opportunity->application_deadline
    //         );
    //     $internship['listingStartDate']    = $this->opportunity->listing_start_date;
    //     $internship['listingEndDate']      = $this->opportunity->listing_end_date;
    //     $internship['followerCount']       = $this->opportunity->follower_count;
    //     $internship['status']              = $this->opportunity->status->name;
    //     $internship['organizationName']    = $this->opportunity->organization->name ?? '';
    //     // $internship['parentOpportunity']   = $this->opportunity->parentOpportunity;
    //     // $internship['supervisorUser']      = $this->opportunity->supervisorUser;
    //     // $internship['submittingUser']      = $this->opportunity->submittingUser;

    //     // Index Location Cities
    //     $internship['locations'] = '';
    //     foreach ($this->opportunity->addresses as $address) {
    //         $internship['locations'] .= $address['city'] . $address['state'];
    //     }

    //     // Index Addresses
    //     // $internship['addresses'] = $this->opportunity->addresses->map(function ($data) {
    //     //                                 return $data['city'] .
    //     //                                         ( is_null($data['state']) ? '' : (', ' . $data['state']) ) .
    //     //                                         ( is_null($data['country']) ? '' : (', ' . $data['country']) );
    //     // })->toArray();

    //     // Index Affiliations
    //     $internship['affiliations'] = $this->opportunity->affiliations->map(function ($data) {
    //         return $data['name'];
    //     })->toArray();

    //     // Index Categories names
    //     $internship['categories'] = $this->opportunity->categories->map(function ($data) {
    //         return $data['name'];
    //     })->toArray();

    //     // Index Keywords names
    //     $internship['keywords'] = $this->opportunity->keywords->map(function ($data) {
    //         return $data['name'];
    //     })->toArray();

    //     return $internship;
    // }
}
