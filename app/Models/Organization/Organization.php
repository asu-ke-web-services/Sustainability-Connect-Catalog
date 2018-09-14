<?php

namespace SCCatalog\Models\Organization;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use RichanFongdasen\EloquentBlameable\BlameableTrait;

/**
 * Class Organization
 */
class Organization extends Model
{
    use BlameableTrait;
    use Searchable;
    use SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    public $fillable = [
        'name',
        'organization_type_id',
        'organization_status_id',
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

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\OrganizationStatus::class, 'organization_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function type()
    {
        return $this->belongsTo(\SCCatalog\Models\Lookup\OrganizationType::class, 'organization_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function addresses()
    {
        return $this->belongsToMany(\SCCatalog\Models\Address\Address::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function notes()
    {
        return $this->belongsToMany(\SCCatalog\Models\Note\Note::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
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
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function shouldBeSearchable()
    {
        return false;
//         if (
//             $this->review_status_id !== 1 ||
//             $this->isPublished() === false
//         ) {
//             return false;
//         }
//
//         return true;
    }

    public function toSearchableArray()
    {
        $organization = array();

        $organization['name'] = $this->name;
        $organization['type'] = $this->type->name;
        $organization['status'] = $this->status->name;

        // Index Addresses
        $organization['addresses'] = $this->addresses->map(function ($data) {
                                        return $data['city'] .
                                                ( is_null($data['state']) ? '' : (', ' . $data['state']) ) .
                                                ( is_null($data['country']) ? '' : (', ' . $data['country']) );
        })->toArray();

        // // Index Notes body content
        // $organization['notes'] = $this->notes->map(function ($data) {
        //                                 return $data['body'];
        // })->toArray();

        return $organization;
    }
}
