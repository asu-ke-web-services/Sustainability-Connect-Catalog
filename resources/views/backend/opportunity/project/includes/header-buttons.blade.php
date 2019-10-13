<div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
    <a href="{{ route('admin.opportunity.project.print', $project) }}"
            class="btn btn-secondary ml-1"
            data-toggle="tooltip"
            title="Print">
        <i class="fas fa-print"></i>
    </a>

    <a href="{{ route('admin.opportunity.project.edit', $project) }}"
            class="btn btn-primary ml-1"
            data-toggle="tooltip"
            title="@lang('buttons.general.crud.edit')">
        <i class="fas fa-edit"></i>
    </a>

    <a href="{{ route('admin.opportunity.project.destroy', $project) }}"
            data-method="delete"
            data-trans-button-cancel="@lang('buttons.general.cancel')"
            data-trans-button-confirm="@lang('buttons.general.crud.delete')"
            data-trans-title="@lang('strings.backend.opportunity.projects.delete_project')"
            class="btn btn-danger ml-1">
        <i class="fas fa-trash"
                data-toggle="tooltip"
                data-placement="top"
                title="@lang('buttons.general.crud.delete')"></i>
    </a>
</div>
