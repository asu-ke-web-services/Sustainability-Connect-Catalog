<?php

namespace SCCatalog\Models\Attachment;

use Altek\Eventually\Eventually;
use Altek\Accountant\Contracts\Recordable;
use Altek\Accountant\Recordable as RecordableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\Media as BaseMedia;

/**
 * Class Attachment
 */
class Attachment extends BaseMedia implements Recordable
{
    use Eventually,
        RecordableTrait,
        SoftDeletes;

    /**
     * The attributes that should be mutated to dates (automatically cast to Carbon instances).
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'attachment_type_id',
        'attachment_status_id',
        'comments',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'attachment_type_id' => 'nullable|integer',
        'attachment_status_id' => 'nullable|integer',
        'comments' => 'nullable',
    ];
}
