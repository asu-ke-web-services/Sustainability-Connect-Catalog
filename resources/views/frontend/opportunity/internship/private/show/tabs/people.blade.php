
<div class="col">
    <div class="card">
        <div class="card-body">
            <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                <a href="{{ route('frontend.opportunity.internship.private.user.add', $internship) }}"
                    class="btn btn-success ml-1"
                    data-toggle="tooltip"
                    title="Add Project User">
                    <span><span class="fas fa-plus-circle"></span>&nbsp;Add Project User</span>
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><h4>Project Leadership</h4></div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">Project Supervisor: {{ $internship->supervisorUser->name ?? '' }}</li>
                <li class="list-group-item">ASU Program Lead: {{ $internship->program_lead }}</li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Applicants</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="w-25">Name</th>
                            <th>Comments</th>
                            {{-- <th>{{ __('labels.general.actions') }}</th> --}}
                        </tr>
                    </thead>
                    @foreach($internship->applicants as $applicant)
                    <tbody>
                        <tr>
                            <td>{{ $applicant->full_name }} ({{ $applicant->userType->name }})</td>
                            <td>{{ $applicant->pivot->comments }}</td>
                            {{-- <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                    <a href="{{ route('frontend.opportunity.internship.private.user.show', [$internship, $applicant]) }}"
                                        data-toggle="tooltip" data-placement="top" title="View Project Applicant" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('frontend.opportunity.internship.private.user.edit', [$internship, $applicant]) }}"
                                        data-toggle="tooltip" data-placement="top" title="Edit Project Applicant" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('frontend.opportunity.internship.private.user.delete', [$internship, $applicant]) }}"
                                        data-method="delete"
                                        data-trans-button-cancel="Cancel"
                                        data-trans-button-confirm="Delete"
                                        data-trans-title="Are you sure?!"
                                        class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                </div>
                            </td> --}}
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="card">
            <div class="card-header">
                <h4>Participants</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="w-25">Name</th>
                                <th>Comments</th>
                                {{-- <th>{{ __('labels.general.actions') }}</th> --}}
                            </tr>
                        </thead>
                        @foreach($internship->participants as $participant)
                        <tbody>
                            <tr>
                                <td>{{ $participant->full_name }} ({{ $participant->userType->name }})</td>
                                <td>{{ $participant->pivot->comments }}</td>
                                {{-- <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                        <a href="{{ route('frontend.opportunity.internship.private.user.show', [$internship, $participant]) }}"
                                            data-toggle="tooltip" data-placement="top" title="View Project Participant" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('frontend.opportunity.internship.private.user.edit', [$internship, $participant]) }}"
                                            data-toggle="tooltip" data-placement="top" title="Edit Project Participant" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('frontend.opportunity.internship.private.user.delete', [$internship, $participant]) }}"
                                            data-method="delete"
                                            data-trans-button-cancel="Cancel"
                                            data-trans-button-confirm="Delete"
                                            data-trans-title="Are you sure?!"
                                            class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                    </div>
                                </td> --}}
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    <div class="card">
        <div class="card-header">
            <h4>Mentors</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="w-25">Name</th>
                            <th>Comments</th>
                            {{-- <th>{{ __('labels.general.actions') }}</th> --}}
                        </tr>
                    </thead>
                    @foreach($internship->mentors as $mentor)
                    <tbody>
                        <tr>
                            <td>{{ $mentor->full_name }} ({{ $mentor->userType->name }})</td>
                            <td>{{ $mentor->pivot->comments }}</td>
                            {{-- <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                    <a href="{{ route('frontend.opportunity.internship.private.user.show', [$internship, $mentor]) }}"
                                        data-toggle="tooltip" data-placement="top" title="View Project Mentor" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('frontend.opportunity.internship.private.user.edit', [$internship, $mentor]) }}"
                                        data-toggle="tooltip" data-placement="top" title="Edit Project Mentor" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('frontend.opportunity.internship.private.user.delete', [$internship, $mentor]) }}"
                                        data-method="delete"
                                        data-trans-button-cancel="Cancel"
                                        data-trans-button-confirm="Delete"
                                        data-trans-title="Are you sure?!"
                                        class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                                </div>
                            </td> --}}
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><h4>Followers</h4></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="w-25">Name</th>
                            {{-- <th>{{ __('labels.general.actions') }}</th> --}}
                        </tr>
                    </thead>
                    @foreach($internship->followers as $follower)
                    <tbody>
                        <tr>
                            <td>{{ $follower->full_name }} ({{ $applicant->userType->name }})</td>
                            {{-- <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                    <a href="{{ route('frontend.opportunity.internship.private.user.show', [$internship, $follower]) }}"
                                        data-toggle="tooltip" data-placement="top" title="View Project Follower" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                </div>
                            </td> --}}
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
