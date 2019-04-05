
<div class="col">
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
            <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                {{-- <a href="{{ route('frontend.opportunity.internship.private.user.add', $internship, 'participant') }}" --}}
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
                            <th>Status</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    @foreach($internship->participants as $participant)
                    <tbody>
                        <tr>
                            <td>{{ $participant->full_name }}</td>
                            <td></td>
                            <td></td>
                            {!! $internship->user_action_buttons !!}
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
                {{-- <a href="{{ route('frontend.opportunity.internship.private.user.add', $internship, 'participant') }}" --}}
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
                            <th>Status</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    @foreach($internship->mentors as $mentor)
                    <tbody>
                        <tr>
                            <td>{{ $mentor->full_name }}</td>
                            <td></td>
                            <td></td>
                            {!! $internship->user_action_buttons !!}
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
                            <th>Status</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    @foreach($internship->followers as $follower)
                    <tbody>
                        <tr>
                            <td>{{ $follower->full_name }}</td>
                            <td></td>
                            <td></td>
                            {!! $internship->user_action_buttons !!}
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
