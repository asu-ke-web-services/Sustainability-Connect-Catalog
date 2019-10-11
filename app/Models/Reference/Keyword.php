<?php

namespace SCCatalog\Models\Reference;

use SCCatalog\Models\BaseReferenceModel;

/**
 * Class Keyword
 */
class Keyword extends BaseReferenceModel
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphedByMany
     **/
    public function projects()
    {
        return $this->morphedByMany(\SCCatalog\Models\Opportunity\Project::class, 'keywordable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphedByMany
     **/
    public function internships()
    {
        return $this->morphedByMany(\SCCatalog\Models\Opportunity\Internship::class, 'keywordable');
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.lookup.keyword.edit', $this) . '" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.edit') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="' . route('admin.lookup.keyword.destroy', $this) . '"
            data-method="delete"
            data-trans-button-cancel="' . __('buttons.general.cancel') . '"
            data-trans-button-confirm="' . __('buttons.general.crud.delete') . '"
            data-trans-title="' . __('strings.backend.general.are_you_sure') . '"
            class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.delete') . '"></i></a> ';
    }
}
