<div class="col">
    <div class="card">
        @can('manage project')
        <div class="card-header">
            <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                <a href="{{ route('frontend.opportunity.project.private.note.add', $project) }}"
                        class="btn btn-success ml-1"
                        data-toggle="tooltip"
                        title="Add Note">
                        <span><span class="fas fa-plus-circle"></span>&nbsp;Add Note</span>
                </a>
            </div>
        </div>
        @endcan
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    @foreach($project->notes as $note)
                        <tr>
                            <th class="w-25">{{ !empty($note->user) ? ucwords($note->user->full_name) . ': ' . $note->created_at->toFormattedDateString() : '' }}</th>
                            <td>@markdown($note->body)</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
