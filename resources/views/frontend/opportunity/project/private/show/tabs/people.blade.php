
<div class="col">
    <div class="card">
        <div class="card-header"><h4>Project Leadership</h4></div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">Project Supervisor: {{ $project->supervisorUser->name ?? '' }}</li>
                <li class="list-group-item">ASU Program Lead: {{ $project->program_lead }}</li>
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
                            <th>Name</th>
                            <th>Type</th>
                            {{-- <th>{{ __('labels.general.actions') }}</th> --}}
                        </tr>
                    </thead>
                    @foreach($project->applicants as $applicant)
                    <tbody>
                        <tr>
                            <td>{{ $applicant->full_name }}</td>
                            <td>{{ $applicant->userType->name }}</td>
                            {{-- <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                    <a href="{{ route('frontend.opportunity.project.private.user.show', [$project, $applicant]) }}"
                                        data-toggle="tooltip" data-placement="top" title="View Project Applicant" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('frontend.opportunity.project.private.user.edit', [$project, $applicant]) }}"
                                        data-toggle="tooltip" data-placement="top" title="Edit Project Applicant" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('frontend.opportunity.project.private.user.delete', [$project, $applicant]) }}"
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
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                    {{-- <a href="{{ route('frontend.opportunity.project.private.user.add', $project, 'participant') }}" --}}
                    <a href="#"
                            class="btn btn-success ml-1 disabled"
                            data-toggle="tooltip"
                            title="Add Participant">
                            <span><span class="fas fa-plus-circle"></span>&nbsp;Add Participant</span>
                    </a>
                </div>
                <h4>Participants</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                {{-- <th>{{ __('labels.general.actions') }}</th> --}}
                            </tr>
                        </thead>
                        @foreach($project->participants as $participant)
                        <tbody>
                            <tr>
                                <td>{{ $participant->full_name }}</td>
                                <td>{{ $participant->userType->name }}</td>
                                {{-- <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                        <a href="{{ route('frontend.opportunity.project.private.user.show', [$project, $participant]) }}"
                                            data-toggle="tooltip" data-placement="top" title="View Project Participant" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('frontend.opportunity.project.private.user.edit', [$project, $participant]) }}"
                                            data-toggle="tooltip" data-placement="top" title="Edit Project Participant" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('frontend.opportunity.project.private.user.delete', [$project, $participant]) }}"
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
            <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                {{-- <a href="{{ route('frontend.opportunity.project.private.user.add', $project, 'participant') }}" --}}
                <a href="#"
                        class="btn btn-success ml-1 disabled"
                        data-toggle="tooltip"
                        title="Add Mentor">
                        <span><span class="fas fa-plus-circle"></span>&nbsp;Add Mentor</span>
                </a>
            </div>
            <h4>Mentors</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            {{-- <th>{{ __('labels.general.actions') }}</th> --}}
                        </tr>
                    </thead>
                    @foreach($project->mentors as $mentor)
                    <tbody>
                        <tr>
                            <td>{{ $mentor->full_name }}</td>
                            <td>{{ $mentor->userType->name }}</td>
                            {{-- <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                    <a href="{{ route('frontend.opportunity.project.private.user.show', [$project, $mentor]) }}"
                                        data-toggle="tooltip" data-placement="top" title="View Project Mentor" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('frontend.opportunity.project.private.user.edit', [$project, $mentor]) }}"
                                        data-toggle="tooltip" data-placement="top" title="Edit Project Mentor" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('frontend.opportunity.project.private.user.delete', [$project, $mentor]) }}"
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
                            <th>Name</th>
                            <th>Type</th>
                            {{-- <th>{{ __('labels.general.actions') }}</th> --}}
                        </tr>
                    </thead>
                    @foreach($project->followers as $follower)
                    <tbody>
                        <tr>
                            <td>{{ $follower->full_name }}</td>
                            <td>{{ $follower->userType->name }}</td>
                            {{-- <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                    <a href="{{ route('frontend.opportunity.project.private.user.show', [$project, $follower]) }}"
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
