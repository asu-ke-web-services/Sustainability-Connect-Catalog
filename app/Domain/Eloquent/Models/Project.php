<?php

namespace SCCatalog\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project
 * @package SCCatalog\Models
 * @version June 20, 2018, 11:48 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesAddresses
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesCategories
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesKeywords
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesNotes
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
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
    use SoftDeletes;

    public $table = 'projects';

    protected const CREATED_AT = 'created_at';
    protected const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];


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

    /**
     * Get the project's root opportunity
     */
    public function opportunity()
    {
        return $this->morphOne(Opportunity::class, 'opportunityable');
    }
}
