<?php

namespace SCCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class Project
 * @package SCCatalog\Models
 * @version June 20, 2018, 11:48 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection Addresses
 * @property \Illuminate\Database\Eloquent\Collection Categories
 * @property \Illuminate\Database\Eloquent\Collection Keywords
 * @property \Illuminate\Database\Eloquent\Collection Notes
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

    public $table = 'projects';

    protected $dates = [
        'deleted_at',
    ];

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
        'id' => 'integer',
        'compensation' => 'string',
        'responsibilities' => 'string',
        'learning_outcomes' => 'string',
        'sustainability_contribution' => 'string',
        'qualifications' => 'string',
        'application_instructions' => 'string',
        'implementation_paths' => 'string',
        'budget_type' => 'string',
        'budget_amount' => 'string',
        'program_lead' => 'string',
        'success_story' => 'string',
        'library_collection' => 'string'
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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ownerUser()
    {
        return $this->belongsTo(\SCCatalog\Models\User::class, 'owner_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     **/
    public function opportunity()
    {
        return $this->morphOne(\SCCatalog\Models\Opportunity::class, 'opportunityable');
    }

    public function toSearchableArray()
    {
        $project = $this->toArray();

        // $project['id']                  = $this->opportunity->id;
        $project['slug']                = $this->opportunity->slug;
        $project['type']                = 'Project';
        $project['title']               = $this->opportunity->title;
        $project['alt_title']           = $this->opportunity->alt_title;
        $project['description']         = $this->opportunity->description;
        $project['summary']             = $this->opportunity->summary;
        $project['hidden']              = $this->opportunity->hidden;
        $project['startDate']           = $this->opportunity->start_date;
        $project['endDate']             = $this->opportunity->end_date;
        $project['applicationDeadline'] = ( !is_null( $this->opportunity->application_deadline_text ) ? $this->opportunity->application_deadline_text : $this->opportunity->application_deadline );
        $project['listingStarts']       = $this->opportunity->listing_starts;
        $project['listingEnds']         = $this->opportunity->listing_ends;
        $project['status']              = $this->opportunity->status->name;
        $project['organization_name']   = $this->opportunity->organization->name;
        $project['parentOpportunity']   = $this->opportunity->parentOpportunity;
        $project['ownerUser']           = $this->opportunity->ownerUser;
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
