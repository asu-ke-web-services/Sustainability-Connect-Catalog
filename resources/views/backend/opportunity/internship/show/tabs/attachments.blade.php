<div class="col">
    <div class="card">
        <div class="card-header">
            <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                <a href="{{ route('admin.opportunity.internship.attachment.add', $internship) }}"
                        class="btn btn-success ml-1"
                        data-toggle="tooltip"
                        title="Upload Attachment">
                        <span><span class="fas fa-plus-circle"></span>&nbsp;Upload Attachment</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Download</th>
                            <th>Type</th>
                            <th>Visibility</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    @foreach($attachments as $attachment)
                    <tbody>
                        <tr>
                            <td>{{ ucwords($attachment->name) }}</td>
                            <td><a href="{{ $attachment->getUrl() }}">{{ $attachment->file_name }}</a></td>
                            <td>{{ $attachment->getCustomProperty('type') }}</td>
                            <td>{{ $attachment->getCustomProperty('visibility') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                    <a href="{{ route('admin.opportunity.internship.attachment.edit', [$internship, $attachment]) }}" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.edit') }}"></i></a>
                                    <a href="{{ route('admin.opportunity.internship.attachment.delete', [$internship, $attachment]) }}" class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
