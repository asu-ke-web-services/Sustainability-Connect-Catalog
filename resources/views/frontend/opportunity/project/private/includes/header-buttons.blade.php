<div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
    <a href="{{ route('frontend.opportunity.project.private.print', $project) }}"
            class="btn btn-secondary ml-1"
            data-toggle="tooltip"
            title="Print">
        <i class="fas fa-print"></i>
    </a>

@can('manage project')
    <a href="{{ route('frontend.opportunity.project.private.edit', $project) }}"
            class="btn btn-primary ml-1"
            data-toggle="tooltip"
            title="Edit">
        <i class="fas fa-edit"></i>
    </a>
@else
    <a href="{{ route('frontend.opportunity.project.public.edit', $project) }}"
            class="btn btn-primary ml-1"
            data-toggle="tooltip"
            title="Edit">
        <i class="fas fa-edit"></i>
    </a>
@endcan

</div>
