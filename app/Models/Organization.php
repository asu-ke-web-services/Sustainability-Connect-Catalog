<?php

namespace SCCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RichanFongdasen\EloquentBlameable\BlameableTrait;

/**
 * Class Organization
 * @package SCCatalog\Models
 * @version June 20, 2018, 11:29 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesAddresses
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesCategories
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesKeywords
 * @property \Illuminate\Database\Eloquent\Collection opportunitiesNotes
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property integer organization_type_id
 * @property integer organization_status_id
 * @property string name
 */
class Organization extends Model
{
    use BlameableTrait;
    use SoftDeletes;

    public $table = 'organizations';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'organization_type_id',
        'organization_status_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'organization_type_id' => 'integer',
        'organization_status_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
