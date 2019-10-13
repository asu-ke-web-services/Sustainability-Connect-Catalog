<div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
    <a href="{{ route('admin.opportunity.internship.print', $internship) }}"
            class="btn btn-secondary ml-1"
            data-toggle="tooltip"
            title="Print">
        <i class="fas fa-print"></i>
    </a>

    <a href="{{ route('admin.opportunity.internship.edit', $internship) }}"
            class="btn btn-primary ml-1"
            data-toggle="tooltip"
            title="@lang('buttons.general.crud.edit')">
        <i class="fas fa-edit"></i>
    </a>

    <a href="{{ route('admin.opportunity.internship.destroy', $internship) }}"
            data-method="delete"
            data-trans-button-cancel="@lang('buttons.general.cancel')"
            data-trans-button-confirm="@lang('buttons.general.crud.delete')"
            data-trans-title="@lang('strings.backend.opportunity.internships.delete_internship')"
            class="btn btn-danger ml-1">
        <i class="fas fa-trash"
                data-toggle="tooltip"
                data-placement="top"
                title="@lang('buttons.general.crud.delete')"></i>
    </a>
</div>
