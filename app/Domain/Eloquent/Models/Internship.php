<?php

namespace SCCatalog\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Internship
 * @package SCCatalog\Models
 * @version June 20, 2018, 11:49 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesAddresses
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesCategories
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesKeywords
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesNotes
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
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
    use SoftDeletes;

    public $table = 'internships';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


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

    /**
     * Get the internship's root opportunity
     */
    public function opportunity()
    {
        return $this->morphOne(Opportunity::class, 'opportunityable');
    }
}
