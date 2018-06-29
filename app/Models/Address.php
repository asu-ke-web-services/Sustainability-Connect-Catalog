<?php

namespace SCCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RichanFongdasen\EloquentBlameable\BlameableTrait;

/**
 * Class Address
 * @package SCCatalog\Models
 * @version June 20, 2018, 11:29 pm UTC
 *
 * @property string street1
 * @property string street2
 * @property string city
 * @property string state
 * @property string country
 * @property string note
 */
class Address extends Model
{
    use BlameableTrait;
    use SoftDeletes;

    public $table = 'addresses';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'street1',
        'street2',
        'city',
        'state',
        'post_code',
        'country',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'      => 'integer',
        'street1' => 'string',
        'street2' => 'string',
        'city'    => 'string',
        'state'   => 'string',
        'country' => 'string',
        'note'    => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


}
