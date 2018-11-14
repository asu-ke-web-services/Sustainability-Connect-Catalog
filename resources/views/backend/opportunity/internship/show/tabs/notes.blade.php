<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
        @foreach($internship->notes as $note)
            <tr>
                <th>{!! ucwords($note->user->full_name) . ': ' . $note->created_at->toFormattedDateString() !!}</th>
                <td>{!! $note->body !!}</td>
            </tr>
        @endforeach
        </table>
    </div>
</div><!--table-responsive-->
