<?php

namespace SCCatalog\Models\Reference;

use SCCatalog\Models\BaseReferenceModel;

/**
 * Class Affiliation
 */
class Affiliation extends BaseReferenceModel
{
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'access_control' => 'boolean',
        'public' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'opportunity_type_id',
        'order',
        'name',
        'slug',
        'help_text',
        'frontend_fa_icon',
        'backend_fa_icon',
        'access_control',
        'public',
    ];

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.lookup.affiliation.edit', $this) . '" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.edit') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="' . route('admin.lookup.affiliation.destroy', $this) . '"
            data-method="delete"
            data-trans-button-cancel="' . __('buttons.general.cancel') . '"
            data-trans-button-confirm="' . __('buttons.general.crud.delete') . '"
            data-trans-title="' . __('strings.backend.general.are_you_sure') . '"
            class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.delete') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getAccessControlLabelAttribute()
    {
        if ($this->isAccessControl()) {
            return '<span class="badge badge-success">' . __('labels.general.yes') . '</span>';
        }

        return '<span class="badge badge-danger">' . __('labels.general.no') . '</span>';
    }

    /**
     * @return string
     */
    public function getPublicLabelAttribute()
    {
        if ($this->isPublic()) {
            return '<span class="badge badge-success">' . __('labels.general.yes') . '</span>';
        }

        return '<span class="badge badge-danger">' . __('labels.general.no') . '</span>';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function opportunityType()
    {
        return $this->belongsTo(\SCCatalog\Models\Reference\OpportunityType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphedByMany
     **/
    public function projects()
    {
        return $this->morphedByMany(\SCCatalog\Models\Opportunity\Project::class, 'affiliationable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphedByMany
     **/
    public function internships()
    {
        return $this->morphedByMany(\SCCatalog\Models\Opportunity\Internship::class, 'affiliationable');
    }

    /*
     * @return bool
     */
    public function isAccessControl()
    {
        return $this->access_control;
    }

    /*
     * @return bool
     */
    public function isPublic()
    {
        return $this->public;
    }
}
