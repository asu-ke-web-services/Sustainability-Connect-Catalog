<div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
    <a href="{{ route('frontend.opportunity.project.print', $project) }}"
            class="btn btn-secondary ml-1"
            data-toggle="tooltip"
            title="Print">
        <i class="fas fa-print"></i>
    </a>

    <a href="{{ route('frontend.opportunity.project.edit', $project) }}"
            class="btn btn-primary ml-1"
            data-toggle="tooltip"
            title="{{ __('buttons.general.crud.edit') }}">
        <i class="fas fa-edit"></i>
    </a>
</div>
