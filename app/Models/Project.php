<?php

namespace SCCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use RichanFongdasen\EloquentBlameable\BlameableTrait;

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
    use BlameableTrait;
    use Searchable;
    use SoftDeletes;

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
        'application_overview',
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
        'application_overview' => 'string',
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



    public static function boot()
    {
        static::saved(function ($model) {
            $model->opportunity->filter(function ($item) {
                return $item->shouldBeSearchable();
            })->searchable();
        });
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function ownerUser()
    {
        return $this->belongsTo(\SCCatalog\Models\User::class, 'owner_user_id');
    }

    public function opportunity()
    {
        return $this->morphOne('\SCCatalog\Models\Opportunity', 'opportunityable');
    }

    public function toSearchableArray()
    {
        $project = $this->toArray();

        $project['opportunity_title'] = $this->opportunity->title;
        $project['opportunity_alt_title'] = $this->opportunity->alt_title;
        $project['opportunity_description'] = $this->opportunity->description;
        $project['opportunity_summary'] = $this->opportunity->summary;

        $project['type'] = 'Project';
        $project['status'] = $this->opportunity->status->name;
        $project['organization_name'] = $this->opportunity->organization->name;

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
