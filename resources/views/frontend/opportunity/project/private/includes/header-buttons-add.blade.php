

@can('manage project')
    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
        <a href="{{ route('frontend.opportunity.project.private.create') }}"
                class="btn btn-success ml-1"
                data-toggle="tooltip"
                title="Create New">
            <i class="fas fa-plus-circle"></i>
        </a>
    </div>
@else
    <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
        <a href="{{ route('frontend.opportunity.project.public.create') }}"
                class="btn btn-success ml-1"
                data-toggle="tooltip"
                title="Submit New">
            <i class="fas fa-plus-circle"></i>
        </a>
    </div>
@endcan
