<?php

namespace SCCatalog\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OpportunityUser extends Pivot
{
    public $table = 'opportunities';

    protected $dates = [
        'deleted_at',
    ];

    public $fillable = [
        'opportunity_id',
        'user_id',
        'relationship_type_id',
        'is_primary',
        'comments'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'                   => 'integer',
        'opportunity_id'       => 'integer',
        'user_id'              => 'integer',
        'relationship_type_id' => 'integer',
        'is_primary'              => 'boolean',
        'comments'             => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
