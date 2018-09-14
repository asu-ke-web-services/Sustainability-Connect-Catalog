<div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
    <a href="{{ route('admin.opportunity.project.edit', $project) }}"
            class="btn btn-primary ml-1"
            data-toggle="tooltip"
            title="{{ __('buttons.general.crud.edit') }}">
        <i class="fas fa-edit"></i>
    </a>

    <a href="{{ route('admin.opportunity.project.destroy', $project) }}"
            data-method="delete"
            data-trans-button-cancel="{{ __('buttons.general.cancel') }}"
            data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}"
            data-trans-title="{{ __('strings.backend.general.are_you_sure') }}"
            class="btn btn-danger ml-1">
        <i class="fas fa-trash"
                data-toggle="tooltip"
                data-placement="top"
                title="{{ __('buttons.general.crud.delete') }}"></i>
    </a>
</div>
