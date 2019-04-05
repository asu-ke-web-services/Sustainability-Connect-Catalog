<div class="col">
    <div class="card">
        <div class="card-header">
            <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                {{-- <a href="{{ route('frontend.opportunity.internship.private.note.add', $internship) }}" --}}
                <a href="#"
                        class="btn btn-success ml-1 disabled"
                        data-toggle="tooltip"
                        title="Add Note">
                        <span><span class="fas fa-plus-circle"></span>&nbsp;Add Note</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    @foreach($internship->notes as $note)
                        <tr>
                            <th>{{ ucwords($note->user->name) . ': ' . $note->created_at->toFormattedDateString() }}</th>
                            <td>@markdown($note->body)</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
