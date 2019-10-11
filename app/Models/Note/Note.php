<?php

namespace SCCatalog\Models\Note;

use SCCatalog\Models\BaseModel;

/**
 * Class Note
 */
class Note extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'user_id',
        'body',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\SCCatalog\Models\Auth\User::class, 'created_by');
    }

    /**
     * Get the owning notable model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     **/
    public function notables()
    {
        return $this->morphTo();
    }
}
