<?php

namespace SCCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class Internship
 * @package SCCatalog\Models
 * @version June 20, 2018, 11:49 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection Addresses
 * @property \Illuminate\Database\Eloquent\Collection Categories
 * @property \Illuminate\Database\Eloquent\Collection Keywords
 * @property \Illuminate\Database\Eloquent\Collection Notes
 * @property string compensation
 * @property string responsibilities
 * @property string qualifications
 * @property string application_instructions
 * @property string comments
 * @property string program_lead
 * @property string success_story
 * @property string library_collection
 * @property date publish_on
 * @property date publish_until
 */
class Internship extends Model
{
    use Searchable;

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
        'comments',
        'program_lead',
        'success_story',
        'library_collection',
        'publish_on',
        'publish_until'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'compensation' => 'string',
        'responsibilities' => 'string',
        'qualifications' => 'string',
        'application_instructions' => 'string',
        'comments' => 'string',
        'program_lead' => 'string',
        'success_story' => 'string',
        'library_collection' => 'string',
        'publish_on' => 'date',
        'publish_until' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


    // public static function boot()
    // {
    //     static::saved(function ($model) {
    //         $model->opportunity->filter(function ($item) {
    //             return $item->shouldBeSearchable();
    //         })->searchable();
    //     });
    // }


    public function opportunity()
    {
        return $this->morphOne('\SCCatalog\Models\Opportunity', 'opportunityable');
    }

    public function toSearchableArray()
    {
        $internship = $this->toArray();

        // $internship['id']                  = $this->opportunity->id;
        $internship['slug']                = $this->opportunity->slug;
        $internship['type']                = 'Internship';
        $internship['title']               = $this->opportunity->title;
        $internship['alt_title']           = $this->opportunity->alt_title;
        $internship['description']         = $this->opportunity->description;
        $internship['summary']             = $this->opportunity->summary;
        $internship['hidden']              = $this->opportunity->hidden;
        $internship['startDate']           = $this->opportunity->start_date;
        $internship['endDate']             = $this->opportunity->end_date;
        $internship['applicationDeadline'] = ( !is_null( $this->opportunity->application_deadline_text ) ? $this->opportunity->application_deadline_text : $this->opportunity->application_deadline );
        $internship['listingStarts']       = $this->opportunity->listing_starts;
        $internship['listingEnds']         = $this->opportunity->listing_ends;
        $internship['status']              = $this->opportunity->status->name;
        $internship['organization_name']   = $this->opportunity->organization->name;
        $internship['parentOpportunity']   = $this->opportunity->parentOpportunity;
        $internship['ownerUser']           = $this->opportunity->ownerUser;
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
