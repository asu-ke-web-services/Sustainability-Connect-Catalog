<?php

namespace SCCatalog\Models;

use Altek\Eventually\Eventually;
use Illuminate\Database\Eloquent\Model;
use Altek\Accountant\Contracts\Recordable;
use Altek\Accountant\Recordable as RecordableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BaseModel
 */
class BaseModel extends Model implements Recordable
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
}
