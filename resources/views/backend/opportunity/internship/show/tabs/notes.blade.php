<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
        @foreach($internship->notes as $note)
            <tr>
                <th>{!! ucwords($note->user->name) . ': ' . $note->toFormattedDateString() !!}</th>
                <td>{!! $note->body !!}</td>
            </tr>
        @endforeach
        </table>
    </div>
</div><!--table-responsive-->
