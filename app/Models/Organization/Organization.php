<?php

namespace SCCatalog\Models\Organization;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
// use Venturecraft\Revisionable\RevisionableTrait;

/**
 * Class Organization
 */
class Organization extends Model
{
    use BlameableTrait;
    // use RevisionableTrait;
    use Searchable;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

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
        'name',
        'url',
        'organization_status_id',
        'organization_type_id',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'                   => 'string|max:255',
        'url'                    => 'string|max:1024',
        'organization_status_id' => 'integer|exists:organization_statuses,id',
        'organization_type_id'   => 'integer|exists:organization_types,id',
    ];



    /*
    |--------------------------------------------------------------------------
    | ATTRIBUTES
    |--------------------------------------------------------------------------
    */

    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.organization.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info"><i class="fas fa-eye"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.organization.edit', $this).'" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.organization.destroy', $this).'"
             data-method="delete"
             data-trans-button-cancel="'.__('buttons.general.cancel').'"
             data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
             data-trans-title="'.__('strings.backend.general.are_you_sure').'"
             class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group btn-group-sm" role="group" aria-label="Actions">
              '.$this->show_button.'
              '.$this->edit_button.'
              '.$this->delete_button.'
            </div>';
    }

    /*
    |--------------------------------------------------------------------------
    | METHODS
    |--------------------------------------------------------------------------
    */

    public function shouldBeSearchable()
    {
        return true;
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array['type'] = $this->type->name;
        $array['status'] = $this->status->name;

        // Index Addresses
        $array['addresses'] = $this->addresses->map(function ($data) {
            return $data['city'] .
                ( is_null($data['state']) ? '' : (', ' . $data['state']) ) .
                ( is_null($data['country']) ? '' : (', ' . $data['country']) );
        })->toArray();

        return $array;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status() : BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\OrganizationStatus::class, 'organization_status_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function type() : BelongsTo
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\OrganizationType::class, 'organization_type_id')->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function addresses() : MorphMany
    {
        return $this->morphMany(\SCCatalog\Models\Address\Address::class, 'addressable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     **/
    public function notes() : MorphMany
    {
        return $this->morphMany(\SCCatalog\Models\Note\Note::class, 'notable');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * @param $query
     * @param bool $active
     * @return mixed
     */
    public function scopeActive($query, $active = true)
    {
        if ($active) {
            return $query
                ->whereIn('organization_status_id', [
                    2, // Active
                ]);
        } else {
            // Closed or archived or otherwise not approved
            return $query
                ->whereIn('organization_status_id', [
                    1, // Inactive
                ]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */


    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

}
