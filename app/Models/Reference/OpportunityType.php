<?php

namespace SCCatalog\Models\Reference;

use SCCatalog\Models\BaseReferenceModel;

/**
 * Class OpportunityType
 */
class OpportunityType extends BaseReferenceModel
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.lookup.opportunity_type.edit', $this) . '" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.edit') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="' . route('admin.lookup.opportunity_type.destroy', $this) . '"
            data-method="delete"
            data-trans-button-cancel="' . __('buttons.general.cancel') . '"
            data-trans-button-confirm="' . __('buttons.general.crud.delete') . '"
            data-trans-title="' . __('strings.backend.general.are_you_sure') . '"
            class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.delete') . '"></i></a> ';
    }
}
