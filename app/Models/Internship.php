<?php

namespace SCCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class Internship
 * @package SCCatalog\Models
 * @version June 20, 2018, 11:49 pm UTC
 *
 * @property string compensation
 * @property string responsibilities
 * @property string qualifications
 * @property string application_instructions
 * @property string program_lead
 * @property string success_story
 * @property string library_collection
 */
class Internship extends Model
{
    use Searchable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    public $table = 'internships';

    protected $dates = [
        'deleted_at',
        'publish_on',
        'publish_until',
    ];

    public $fillable = [
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

    public function opportunity()
    {
        return $this->morphOne('\SCCatalog\Models\Opportunity', 'opportunityable');
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
        $internship = $this->toArray();

        // $internship['id']                  = $this->opportunity->id;
        $internship['slug']                = $this->opportunity->slug;
        $internship['type']                = 'Internship';
        $internship['name']                = $this->opportunity->name;
        $internship['publicName']          = $this->opportunity->public_name;
        $internship['description']         = $this->opportunity->description;
        $internship['summary']             = $this->opportunity->summary;
        $internship['isHidden']            = $this->opportunity->is_hidden;
        $internship['startDate']           = $this->opportunity->start_date;
        $internship['endDate']             = $this->opportunity->end_date;
        $internship['applicationDeadline'] = (
                !is_null($this->opportunity->application_deadline_text) ?
                $this->opportunity->application_deadline_text :
                $this->opportunity->application_deadline
            );
        $internship['listingStarts']       = $this->opportunity->listing_starts;
        $internship['listingEnds']         = $this->opportunity->listing_ends;
        $internship['status']              = $this->opportunity->status->name;
        $internship['organizationName']   = $this->opportunity->organization->name;
        // $internship['parentOpportunity']   = $this->opportunity->parentOpportunity;
        $internship['supervisorUser']      = $this->opportunity->supervisorUser;
        $internship['submittingUser']      = $this->opportunity->submittingUser;

        // Index Addresses
        $internship['addresses'] = $this->opportunity->addresses->map(function ($data) {
                                        return $data['city'] .
                                                ( is_null($data['state']) ? '' : (', ' . $data['state']) ) .
                                                ( is_null($data['country']) ? '' : (', ' . $data['country']) );
        })->toArray();

        // Index Categories names
        $internship['categories'] = $this->opportunity->categories->map(function ($data) {
                                        return $data['name'];
        })->toArray();

        // Index Keywords names
        $internship['keywords'] = $this->opportunity->keywords->map(function ($data) {
                                        return $data['name'];
        })->toArray();

        // Index Notes body content
        $internship['notes'] = $this->opportunity->notes->map(function ($data) {
                                        return $data['body'];
        })->toArray();

        return $internship;
    }
}
