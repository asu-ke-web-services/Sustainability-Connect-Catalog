<h2>People</h2>

    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.people.supervisor_user')</th>
                <td>{{ $internship->supervisorUser->name ?? '' }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.people.submitting_user')</th>
                <td>{{ $internship->submittingUser->name ?? '' }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.people.program_lead')</th>
                <td>{{ $internship->program_lead }}</td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.people.participants')</th>
                <td>
                    <ul>
                        @foreach($internship->participants as $participant)
                            <li><span style="width: 150px; margin-right: 10px;">{{ $participant->full_name }}</span>{!! $internship->user_action_buttons !!}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.people.mentors')</th>
                <td>
                    <ul>
                        @foreach($internship->mentors as $mentor)
                            <li><span style="width: 150px; margin-right: 10px;">{{ $mentor->full_name }}</span>{!! $internship->user_action_buttons !!}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

            <tr>
                <th>@lang('labels.backend.opportunity.internships.tabs.content.people.followers')</th>
                <td>
                    <ul>
                        @foreach($internship->followers as $follower)
                            <li><span style="width: 150px; margin-right: 10px;">{{ $follower->full_name }}</span>{!! $internship->user_action_buttons !!}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>

        </table>
    </div>
