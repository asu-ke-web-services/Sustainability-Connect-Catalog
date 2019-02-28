<div class="col">
    {{-- <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
        <a href="{{ route('admin.opportunity.project.create') }}"
           class="btn btn-success ml-1"
           data-toggle="tooltip"
           title="Upload New Attachment">
            <i class="fas fa-plus-circle"></i>
        </a>
    </div> --}}
    <div class="table-responsive">
        <table class="table table-hover">
        @foreach($attachments as $attachment)
            <tr>
                <th>{{ ucwords($attachment->name)  }}</th>
                <td><a href="{{ $attachment->getUrl() }}">{{ $attachment->file_name }}</a></td>
            </tr>
        @endforeach
        </table>
    </div>
</div><!--table-responsive-->
