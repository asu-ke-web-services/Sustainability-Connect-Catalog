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
        'compensation',
        'responsibilities',
        'learning_outcomes',
        'sustainability_contribution',
        'qualifications',
        'application_instructions',
        'implementation_paths',
        'budget_type',
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

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function toSearchableArray()
    {
        $project = $this->toArray();

        // $project['id']                  = $this->opportunity->id;
        $project['slug']                = $this->opportunity->slug;
        $project['type']                = 'Project';
        $project['name']                = $this->opportunity->name;
        $project['publicName']          = $this->opportunity->public_name;
        $project['description']         = $this->opportunity->description;
        $project['summary']             = $this->opportunity->summary;
        $project['isHidden']            = $this->opportunity->is_hidden;
        $project['startDate']           = $this->opportunity->start_date;
        $project['endDate']             = $this->opportunity->end_date;
        $project['applicationDeadline'] = (
                !is_null($this->opportunity->application_deadline_text) ?
                $this->opportunity->application_deadline_text :
                $this->opportunity->application_deadline
            );
        $project['listingStarts']       = $this->opportunity->listing_starts;
        $project['listingEnds']         = $this->opportunity->listing_ends;
        $project['status']              = $this->opportunity->status->name;
        $project['organizationName']   = $this->opportunity->organization->name;
        // $project['parentOpportunity']   = $this->opportunity->parentOpportunity;
        $project['supervisorUser']      = $this->opportunity->supervisorUser;
        $project['submittingUser']      = $this->opportunity->submittingUser;


        // Index Addresses
        $project['addresses'] = $this->opportunity->addresses->map(function ($data) {
                                        return $data['city'] .
                                                ( is_null($data['state']) ? '' : (', ' . $data['state']) ) .
                                                ( is_null($data['country']) ? '' : (', ' . $data['country']) );
        })->toArray();

        // Index Categories names
        $project['categories'] = $this->opportunity->categories->map(function ($data) {
                                        return $data['name'];
        })->toArray();

        // Index Keywords names
        $project['keywords'] = $this->opportunity->keywords->map(function ($data) {
                                        return $data['name'];
        })->toArray();

        // Index Notes body content
        $project['notes'] = $this->opportunity->notes->map(function ($data) {
                                        return $data['body'];
        })->toArray();

        return $project;
    }
}
