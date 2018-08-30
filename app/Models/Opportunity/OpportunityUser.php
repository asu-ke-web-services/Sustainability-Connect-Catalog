<?php

namespace SCCatalog\Models\Opportunity;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OpportunityUser extends Pivot
{
    public $table = 'opportunities';

    protected $dates = [
        'created_at',
        'updated_at',
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
        'is_primary' => 'boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];
}
