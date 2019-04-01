<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
        @foreach($project->notes as $note)
            <tr>
                <th>{{ ucwords($note->user->name) . ': ' . $note->created_at->toFormattedDateString() }}</th>
                <td>@markdown($note->body)</td>
            </tr>
        @endforeach
        </table>
    </div>
</div><!--table-responsive-->
