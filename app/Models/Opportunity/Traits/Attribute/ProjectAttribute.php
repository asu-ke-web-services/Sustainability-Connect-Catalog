<?php

namespace SCCatalog\Models\Opportunity\Traits\Attribute;

/**
 * Trait ProjectAttribute.
 */
trait ProjectAttribute
{
    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="' . route('admin.opportunity.project.show', $this) . '" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.view') . '" class="btn btn-info"><i class="fas fa-eye"></i></a>';
    }

    /**
     * @return string
     */
    public function getCloneButtonAttribute()
    {
        return '<a href="' . route('admin.opportunity.project.clone', $this) . '" class="dropdown-item">' . __('buttons.general.crud.clone') . '</a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.opportunity.project.edit', $this) . '" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.edit') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getPrintButtonAttribute()
    {
        return '<a href="' . route('admin.opportunity.project.print', $this) . '" class="btn btn-secondary"><i class="fas fa-print" data-toggle="tooltip" data-placement="top" title="Print View"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="' . route('admin.opportunity.project.destroy', $this) . '"
            data-method="delete"
            data-trans-button-cancel="' . __('buttons.general.cancel') . '"
            data-trans-button-confirm="' . __('buttons.general.crud.delete') . '"
            data-trans-title="' . __('strings.backend.opportunity.projects.delete_project') . '"
            class="dropdown-item">' . __('buttons.general.crud.delete') . '</a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="' . route('admin.opportunity.project.delete-permanently', $this) . '" name="confirm_item" class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="' . __('buttons.backend.opportunity.project.delete_permanently') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="' . route('admin.opportunity.project.restore', $this) . '" name="confirm_item" class="btn btn-info"><i class="fas fa-refresh" data-toggle="tooltip" data-placement="top" title="' . __('buttons.backend.opportunity.project.restore') . '"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->trashed()) {
            return '
                <div class="btn-group" role="group" aria-label="Actions">
                    ' . $this->restore_button . '
                    ' . $this->delete_permanently_button . '
                </div>';
        }

        return '<div class="btn-group btn-group-sm" role="group" aria-label="Actions">
            ' . $this->show_button . '
            ' . $this->edit_button . '

            <div class="btn-group btn-group-sm" role="group">
                <button id="projectActions" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ' . __('labels.general.more') . '
                </button>
                <div class="dropdown-menu" aria-labelledby="projectActions">
                    ' . $this->delete_button . '
                </div>
            </div>
            </div>';
    }

    /**
     * @return string
     */
    public function getFrontendShowButtonAttribute()
    {
        return '<a href="' . route('frontend.opportunity.project.public.show', $this) . '" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.view') . '" class="btn btn-info"><i class="fas fa-eye"></i></a>';
    }

    /**
     * @return string
     */
    public function getFrontendSubmissionEditButtonAttribute()
    {
        return '<a href="' . route('frontend.opportunity.project.public.edit', $this) . '" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.edit') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getFrontendFullEditButtonAttribute()
    {
        return '<a href="' . route('frontend.opportunity.project.private.edit', $this) . '" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="' . __('buttons.general.crud.edit') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getFrontendPrintButtonAttribute()
    {
        return '<a href="' . route('frontend.opportunity.project.private.print', $this) . '" class="btn btn-secondary"><i class="fas fa-print" data-toggle="tooltip" data-placement="top" title="Print View"></i></a>';
    }

    /**
     * @return string
     */
    public function getFrontendSubmissionActionButtonsAttribute()
    {
        return '<div class="btn-group btn-group-sm" role="group" aria-label="Actions">
            ' . $this->frontend_show_button . '
            ' . $this->frontend_submission_edit_button . '
            </div>';
    }

    /**
     * @return string
     */
    public function getFrontendPrivateActionButtonsAttribute()
    {
        return '<div class="btn-group btn-group-sm" role="group" aria-label="Actions">
            ' . $this->frontend_show_button . '
            ' . $this->frontend_full_edit_button . '
            </div>';
    }
}
