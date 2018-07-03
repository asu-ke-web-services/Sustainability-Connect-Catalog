<?php

namespace SCCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
    public $table = 'projects';

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


    public function opportunity()
    {
        return $this->morphOne('\SCCatalog\Models\Opportunity', 'opportunityable');
    }

}
