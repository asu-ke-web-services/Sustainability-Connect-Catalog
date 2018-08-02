<?php

namespace SCCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

/**
 * Class Attachment
 * @package SCCatalog\Models
 * @version July 11, 2018
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
class Attachment extends Model implements HasMedia
{
    use BlameableTrait;
    use HasMediaTrait;
    use SoftDeletes;

    public $table = 'attachments';

    protected $dates = [
        'deleted_at',
    ];

    public $fillable = [
        'status',
        'comments',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\SCCatalog\Models\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function opportunity()
    {
        return $this->belongsTo(\SCCatalog\Models\Opportunity::class, 'opportunity_id');
    }
}
