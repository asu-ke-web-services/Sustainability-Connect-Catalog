<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Download</th>
                    <th>Type</th>
                    <th>Pending Approval</th>
                    <th>Visibility</th>
                    {{-- <th>{{ __('labels.general.actions') }}</th> --}}
                </tr>
            </thead>
            @foreach($attachments as $attachment)
            <tbody>
                <tr>
                    <td>{{ ucwords($attachment->name) }}</td>
                    <td><a href="{{ $attachment->getUrl() }}">{{ $attachment->file_name }}</a></td>
                    <td>{{ $attachment->getCustomProperty('type') }}</td>
                    @if (1 == $attachment->getCustomProperty('pending'))
                        <td><span class="badge badge-success">{{ __('labels.general.yes') }}</span></td>
                    @else
                        <td><span class="badge badge-danger">{{ __('labels.general.no') }}</span></td>
                    @endif
                    <td>{{ $attachment->getCustomProperty('visibility') }}</td>
                    {{-- <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                            <a href="{{ route('admin.opportunity.internship.edit_attachment', $internship, $attachment) }}" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="{{ __('buttons.general.crud.edit') }}"></i></a>';
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('labels.general.more') }}</button>
                                <div class="dropdown-menu" aria-labelledby="attachmentActions">
                                    <a href="{{ route('admin.opportunity.internship.delete_attachment', $internship, $attachment) }}"
                                        data-method="delete"
                                        data-trans-button-cancel="{{ __('buttons.general.cancel') }}"
                                        data-trans-button-confirm="{{ __('buttons.general.crud.delete') }}"
                                        data-trans-title="{{ __('strings.backend.general.are_you_sure') }}"
                                        class="dropdown-item">{{ __('buttons.general.crud.delete') }}</a>
                                </div>
                            </div>
                        </div>
                    </td> --}}
                </tr>
            </tbody>
            @endforeach
        </table>
        <div class="btn-toolbar float-left" role="toolbar" aria-label="Toolbar with button groups">
            <a href="{{ route('admin.opportunity.internship.add_attachment', $internship) }}"
            class="btn btn-success ml-1"
            data-toggle="tooltip"
            title="Upload New Attachment">
                <span><span class="fas fa-plus-circle"></span>&nbsp;Upload New Attachment</span>
            </a>
        </div>
    </div>
</div><!--table-responsive-->
