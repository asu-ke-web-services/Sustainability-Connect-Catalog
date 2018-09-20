<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
        @foreach($internship->attachments as $attachment)
            <tr>
                <th>{!! ucwords($attachment->status) !!}</th>
                <td>{!! ucwords($attachment->comments) !!}</td>
            </tr>
        @endforeach
        </table>
    </div>
</div><!--table-responsive-->
